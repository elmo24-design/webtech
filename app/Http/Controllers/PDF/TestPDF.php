<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class TestPDF extends Controller
{
    public function generate(){
        $posts= Post::get();

        $fileName= 'Post_List.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' =>10,
            'margin_top'=>15,
            'margin_bottom'=>20,
            'margin_header'=>10,
            'margin_footer'=>10
        ]);
        $html = \View::make('pdf.demo')->with('posts', $posts);
        $html= $html->render();
        
        $mpdf->SetHeader('WebTech|Web Designs|{PAGENO}');
        $mpdf->SetFooter('Web Tech');
        // $stylesheet = file_get_contents(url('/css/mpdf.css'));
        // $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
