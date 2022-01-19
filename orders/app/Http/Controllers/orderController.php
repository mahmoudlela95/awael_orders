<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('orders.index');
    }
    public function ordersList(){
        $orders = order::all();
        return dataTables()->of($orders)
        ->editColumn('order_contents', function($orders){
            $order_contents = $orders->order_contents;
            if (strlen($order_contents) > 300){
                $order_contents = substr($order_contents,"0",strpos($order_contents, ' ', 300));
               $list = $this->nl2li($order_contents);
               return htmlspecialchars($list).'<br /><span style="float:right"><a href="orders/'.$orders->order_id.'">More Contents</a></span>';
            }else{
                return htmlspecialchars($this->nl2li($order_contents));
            }
        })
		->addColumn('action', function ($orders) {
			$s="'Are you sure you want to delete?'";

                return '
				 <form  method="POST">
				<a href="orders/'.$orders->id.'" class="btn status delivered"><i  class="fas fa-info"></i> view</a>
				<a href="orders/'.$orders->id.'/edit" class="btn status pending"><i  class="fas fa-edit"></i> Edit</a>          
				<a onclick="return confirm('.$s.')"  href="orders/'.$orders->id.'/sdelete/" class="btn status return"><i class="fa fa-trash"></i>Delete</a>
				</form>
                ';
            })
            ->make(true); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }

    public function nl2li($str,$ordered = 0, $type = "1") {

        //check if its ordered or unordered list, set tag accordingly
        if ($ordered)
        {
           $tag="ol";
           //specify the type
           $tag_type="type=$type";
        }
        else
        {   
           $tag="ul";
           //set $type as NULL
           $tag_type=NULL;
        }
        
        // add ul / ol tag
        // add tag type
        // add first list item starting tag
        // add last list item ending tag
        $str = "<$tag $tag_type><li>" . $str ."</li></$tag>";
        
        //replace /n with adding two tags
        // add previous list item ending tag
        // add next list item starting tag
        $str = str_replace("\n","</li><br />\n<li>",$str);
        
        //spit back the modified string
        return $str;
        } 
}
