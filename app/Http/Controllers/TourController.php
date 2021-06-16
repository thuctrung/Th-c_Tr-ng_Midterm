<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours= Tour::all();
        return view('tours.tourlist', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tour= Tour::ALL();
        return view('tours.tourcreate',compact('tour'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $this->validate($request, 
        [
            //Kiểm tra giá trị rỗng 
            'name' => 'required',
            'image' => 'required',
            'typetour'=>'required',
            'schedule' => 'required',         
            'depart' => 'required|date',
            'number' => 'required',
            'price' => 'required',

        ],          
        [
            //Tùy chỉnh hiển thị thông báo
            
            'name.required' => 'Bạn chưa nhập name!',
            'image.required' => 'Bạn chưa thêm hình ảnh!',
            'typetour.required' => 'Bạn chưa nhập typetour!',
            'schedule.required'=>'Bạn chưa nhập schedule!',
            'depart.required' => 'Bạn chưa nhập ngày!',
            'depart.date' => 'cột depart phải là kiểu ngày!',
            'number.required'=>'Bạn chưa nhập số người đi!',
            'price.required'=>'Bạn chưa nhập số tiền!',
        ]
    );
     //kiểm tra file tồn tại

     $name='';  
     if($request->hasfile('image_file'))
     {
         //Hàm kiểm tra dữ liệu
         $this->validate($request, 
             [
             //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                 'image_file' => 'mimes:jpg,jpeg,png,gif|max:2048',
             ],          
             [
             //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                 'image_file.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                 'image_file.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
             ]
         );
         $file = $request->file('image_file');
         $name=time().'_'.$file->getClientOriginalName();
         $destinationPath=public_path('images/tours'); //project\public\images\cars, //public_path(): trả về đường dẫn tới thư mục public
         $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/images/cars
     }   
                     
        $name = $request->input('name');                  
        $typetour = $request->input('typetour');  
        $schedule = $request->input('schedule');   
        $depart = $request->input('depart');   
        $number =$request->input('number');
        $price =$request->input('price');
                            
        $file = $request->file('image');                    
        $name_img = time() . '_' . $file->getClientOriginalName();                  
        $destinationPath = public_path('tours');       //project\public\images\ //public_path(): trả về đường dẫn tới thư mục public           
        $file->move($destinationPath, $name_img);               //lưu hình ảnh vào thư mục public/images/cars   
                            
        $tour = new Tour();                   
        $tour->name = $name;                   
        $tour->typetour = $typetour;                   
        $tour->image = $name_img;
        $tour->depart=$depart;
        $tour->schedule=$schedule;
        $tour->number= $number;
        $tour->price=$price;

        $tour->save();
                            
        return redirect('/tour')->with('success', 'Thêm thành công!');                  
               
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $tour = Tour::find($id);
        // return view('tours.detail', compact('tour', id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        //
    }
}
