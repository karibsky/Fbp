<?php

Route::get('/', function () {
    $services = App\Services::all();
    $sliders = App\Slider::all();
    $clients = App\Clients::all();
    return view('welcome')->with(['services'=> $services, 'sliders' => $sliders, 'clients'=>$clients]);
});

Route::get('/application', function() {
    $programs = App\Programs::all();
    return view('application',compact('programs'));
});

Route::post('/application/new', 'ApplicationsController@send');

Route::get('/application/{id}', 'ApplicationsController@show');

Route::get('search/{search}', function(Request $request, $search) {
    $catalogs = \App\Catalog::where('name', 'like', '%'.$search.'%')->paginate(9);
    $categories = \App\category::paginate(9);
    return view('catalog', compact('catalogs', 'categories'));
});

Route::get('catalog/{category}', function(Request $request, $category) {
    $catalogs = \App\Catalog::where('category', 'like', '%'.$category.'%')->orderBy('subcategory')->paginate(9);
    $categories = \App\category::paginate(9);
    $subs = \App\Subcategories::where('idcategory', '=', $category)->paginate(9);
    return view('catalog', compact('catalogs', 'categories', 'subs'));
});

Route::get('catalog/{category}/{sub}', function(Request $request, $category, $sub) {
    $catalogs = \App\Catalog::where('category', $category)->where('subcategory', $sub)->orderBy('id')->paginate(9);
    $categories = \App\category::paginate(9);
    $subs = \App\Subcategories::where('idcategory', '=', $category)->paginate(9);
    return view('catalog', compact('catalogs', 'categories', 'subs'));
});

Route::get('catalog', function(\Illuminate\Http\Request $request) {
    if($request->has('keywords')) {
        $keywords = \Illuminate\Support\Facades\Input::get('keywords');
        if($keywords != '') {
            if(\App\Catalog::where('name', 'like', '%' . $keywords . '%')->count() > 0)
            {
                $catalogs = \App\Catalog::where('name', 'like', '%' . $keywords . '%')->paginate(9);
                $categories = \App\category::paginate(9);
                return view('catalog', compact('catalogs', 'categories'));
            }
            else
            {
              $catalogs = \App\Catalog::paginate(9);
              $categories = \App\category::paginate(9);
              return view('catalog', compact('catalogs', 'categories'))->withErrors(['Ничего не найдено :(', '']);
          }
      }
      else {
        return;
    }
}
else {
    $catalogs = \App\Catalog::orderBy('id', 'desc')->paginate(9); //\App\Catalog::orderBy('id', 'desc')->paginate(9); this is old
    $categories = \App\category::paginate(9);
    return view('catalog', compact('catalogs', 'categories'));
}
});

Auth::routes();

Route::get('cart/add/{id}', function (Request $request, $id) {
    if(Auth::user()) {
        $product = App\Catalog::where('id', $id)->first();
        $cart = Session::get('cart');
        $qty = '1';
        $carts = collect([
            $product->id,
            $product->name,
            $product->price,
            $product->picture,
            $qty
        ]);

        Session::push('cart', $carts);
        //Session::forget('cart');
        //Session::flash('success','Товар успешно добавлен в корзину!');
        return redirect('cart');
        //return dd(Session::get('cart'));
    }
    else {
        return redirect('login')->withErrors(['Для добавления в корзину необходимо авторизоваться', '']);
    }
});

Route::get('cart', function () {
    if(Auth::user()) {
        return view('cart');
    }
    else {
        return redirect('login');
    }
});

Route::get('cart/delete/{id}', function ($id) {
    Session::forget('cart.' . $id);
    return redirect()->back();
});

Route::post('order', function(\Illuminate\Http\Request $request) {
    $maxCount = max(count($request['idproducts']), count($request['number']));
    for($i=0; $i < $maxCount; $i++) {
    if(isset($request['idproducts'][$i]) && isset($request['number'][$i])) {
        $test = new App\Orders;
        $test->userid = Auth::user()->id;
        $test->versionid = $request['idproducts'][$i];
        $test->qty = $request['number'][$i];
        $test->status = 'Принят';
        $test->order = 'Заказ товара';
        $test->save();
    }
}
    Session::forget('cart');
    return redirect('cart')->withErrors(['Заказ принят на обработку', '']);;
});

Route::get('/promo', function() {
    $promos = App\Promo::all();
    return view('promo',compact('promos'));
});

//admin routes 

Route::get('admin', function() {
    if(Auth::check() && Auth::user()->isAdmin) {
        $products = \App\Catalog::all();
        return view('admin.home', compact('products'));
    }
    else {
        return redirect()->back();
    }
});

Route::get('admin/product/delete/{id}', function($id) {
    App\Catalog::destroy($id);
    return redirect()->back()->withErrors('Товар успешно удален!');
});

Route::get('admin/product/add', function() {
    return view('admin.add');
});

Route::post('admin/product/add/new', function (\Illuminate\Http\Request $request) {
        $product = new App\Catalog;
        $product->article = $request['article'];
        $product->name = $request['name'];
        $product->description = $request['desc'];
        $product->category = $request['category'];
        $product->subcategory = $request['subcategory'];
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/img/catalog');
            $image->move($destinationPath, $name);
            $product->picture = $name;
          }
        $product->price = $request['price'];
        $product->redarea = $request['red'];
        $product->greenarea = $request['green'];
        $product->save();
        return redirect('admin')->withErrors('Товар успешно добавлен!');
});

Route::get('admin/product/update/{id}', function($id) {
    $products = App\Catalog::where('id', $id)->first();
    return view('admin.update',compact('products'));
});

Route::post('admin/product/update/new{id}', function (\Illuminate\Http\Request $request) {
    $product = App\Catalog::find($request->id);
    if($request->hasFile('file')) {
        $image = $request->file('file');
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('/img/catalog');
        $image->move($destinationPath, $name);
        $product->update([
            'article' => $request['article'],
            'name' => $request['name'],
            'description' => $request['desc'],
            'category' => $request['category'],
            'subcategory' => $request['subcategory'],
            'picture' => $name,
            'price' => $request['price'],
            'redarea' => $request['red'], 
            'greenarea' => $request['green']
        ]);
    }
    else {
        $product->update([
            'article' => $request['article'],
            'name' => $request['name'],
            'description' => $request['desc'],
            'category' => $request['category'],
            'subcategory' => $request['subcategory'],
            'price' => $request['price'],
            'redarea' => $request['red'], 
            'greenarea' => $request['green']
        ]);
    }
    return redirect('admin')->withErrors('Информация о товаре успешно изменена!');
});

Route::get('admin/promo', function() {
    if(Auth::check() && Auth::user()->isAdmin) {
        $promos = \App\Promo::all();
        return view('admin.promo_home', compact('promos'));
    }
    else {
        return redirect()->back();
    }
});

Route::get('admin/promo/delete/{id}', function($id) {
    \App\Promo::destroy($id);
    return redirect()->back()->withErrors('Акция успешно удалена!');
});

Route::get('admin/promo/add', function() {
    return view('admin.promo_add');
});

Route::post('admin/promo/add/new', function (\Illuminate\Http\Request $request) {
    $promo = new \App\Promo;
    $promo->title = $request['title'];
    $promo->text = $request['text'];
    $promo->url = $request['url'];
    $promo->save();
    return redirect('admin/promo')->withErrors('Акция успешно добавлена!');
});

Route::get('admin/promo/update/{id}', function($id) {
    $promos = \App\Promo::where('id', $id)->first();
    return view('admin.promo_update',compact('promos'));
});

Route::post('admin/promo/update/new{id}', function (\Illuminate\Http\Request $request) {
    $promo = \App\Promo::find($request->id);
        $promo->update([
            'title' => $request['title'],
            'text' => $request['text'],
            'url' => $request['url'],
        ]);
    return redirect('admin/promo')->withErrors('Информация об акции успешно изменена!');
});

Route::get('admin/users', function() {
    if(Auth::check() && Auth::user()->isAdmin) {
        $users = \App\User::all();
        return view('admin.user_home', compact('users'));
    }
    else {
        return redirect()->back();
    }
});

Route::get('admin/user/delete/{id}', function($id) {
    \App\User::destroy($id);
    return redirect()->back();
});

Route::get('admin/user/add', function() {
    return view('admin.user_add');
});

Route::post('admin/user/add/new', function (\Illuminate\Http\Request $request) {
    $user = new \App\User;
    $user->name = $request['name'];
    $user->lastname = $request['lastname'];
    $user->patronymic = $request['patronymic'];
    $user->email = $request['email'];
    $user->phone = $request['phone'];
    $user->organisation = $request['organisation'];
    $user->password = Hash::make($request['password']);
    $user->isAdmin = $request['role'];
    $user->IDversion = "a:1:{s:2:'id';a:1:{i:0;s:2:'79';}";
    $user->regnumber = "a:1:{s:4:'regs';a:1:{i:0;s:7:'4214214';}}";
    $user->save();
    return redirect('admin/users')->withErrors('Пользователь успешно добавлен!');
});

Route::get('admin/user/update/{id}', function($id) {
    $users = \App\User::where('id', $id)->first();
    return view('admin.user_update',compact('users'));
});

Route::post('admin/user/update/new{id}', function (\Illuminate\Http\Request $request) {
    $user = \App\User::find($request->id);
        $user->update([
            'name' => $request['name'],
            'lastname' => $request['lastname'],
            'patronymic' => $request['patronymic'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'organisation' => $request['organisation'],
            'isAdmin' => $request['role']
        ]);
    return redirect('admin/users')->withErrors('Данные пользователя успешно изменены!');
});

Route::get('admin/orders', function() {
    if(Auth::check() && Auth::user()->isAdmin) {
        $orders = \App\Orders::all();
        return view('admin.orders', compact('orders'));
    }
    else {
        return redirect()->back();
    }
});

Route::get('admin/stats', function() {
    if(Auth::check() && Auth::user()->isAdmin) {
        $users = \App\User::all();
        return view('admin.stats');
    }
    else {
        return redirect()->back();
    }
});

Route::get('admin/stats/get/orders', function() {  
    $monthly_orders = DB::table('orders') 
    ->select(DB::raw('MONTH(created_at) as date'), DB::raw('count(*) as orders')) 
    ->groupBy('date') 
    ->get(); 
    return json_encode($monthly_orders);
});

Route::get('admin/stats/get/prices', function() {  
    $min = DB::table("catalog")->min('price');
    $max = DB::table("catalog")->max('price');
    $avg = DB::table("catalog")->avg('price');
    $orders_arr = array(
        'min' => $min,
        'max' => $max,
        'avg' => $avg,
    );
    return json_encode($orders_arr);
});

Route::get('admin/stats/get/cats', function() {
    $cats = DB::table('catalog')->select(DB::raw('count(1) AS count'))->groupBy('subcategory')->get();
    return json_encode($cats);
});




