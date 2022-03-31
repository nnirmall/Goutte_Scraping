<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Arr;

class GoutteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function doScraping() {
        // $getData = array();
        $tablearray = array();
        $client = new Client();

        // $guzzleClient = new GuzzleClient(array(   ----------///adsfasdf
        //     'timeout' => 60,
        // ));

        // $goutteClient->setClient($guzzleClient);
        $crawler = $client->request('GET', 'https://monentreprise.bj/page/annonces');
        $crawler->filter('#annonces-list > div.row')->each(function ($node) {
            // $div1 = $node->filter('.card-body .small-padding-top')->text();
            // /html/body/div[1]/div/section/div/div/div[2]/div/div[2]/div/div[2]/div[43]/div/div
            // dd($node->tag('h5'));
            $getData = $node->each(function ($items) {
                
            //    return ($items->filter('.row')>each(function ($col) {
            //        return ($col->filter('.col-md-4')->text());
               
            // }));
            $content = $items->filter( '.row' )->filter('.col-md-4')->each(function ($col) { 
                           
                                $tables = $col->filter( 'table' )->filter('tr')->each(function ($tr) { 
                                                return $tr->filter('td')->text();
                                             });
                                            //  $renameMap = [
                                            //     '0' => 'Title',   
                                            //     '1' => 'Object',
                                            //     '2' => 'Capital',
                                            //     '3' => 'The Head Office',
                                            //     '4' => 'Manager',
                                            //     '5' => 'Duration',
                                            //     '6' => 'Deposit',
                                            //     '7' => 'RCCM Registration'
                                            // ];
                                            // $tables = array_combine(array_map(function($el) use ($renameMap) {
                                            //     return $renameMap[$el];
                                            // }, array_keys($tables)), array_values($tables));
                            
                                return array($col->filter( 'h5' )->text() ,$tables ); 
                                
                           
                         });
                      
            return $content;
            //    
            });
            dd($getData);
        });
        
#annonces-list > div.row > div:nth-child(1) > div > div
#annonces-list > div.row > div:nth-child(2) > div > div


        // correct one and implemented above
        // $crawler = $client->request('GET', 'https://monentreprise.bj/page/annonces');

        // $crawler->filter('#annonces-list > div.row > div:nth-child(1) > div > div')->each(function ($node) {
        //     $getData = json_encode($node->each(function ($items) {
        //         $tables = $items->filter( 'table' )->filter('tr')->each(function ($tr) { 
        //             return $tr->filter('td')->each(function ($td) { 
        //                 return $td->text(); 
        //             });
        //          });
        
        //         $title = $items->filter('h5')->text();
        //         $list[] = $items->filter('h5')->text();
                
        //         $list[] = $tables[0][0];
        //         $list[] = $tables[1][0];
        //         $list[] = $tables[2][0];
        //         $list[] = $tables[3][0];
        //         $list[] = $tables[4][0];
        //         $list[] = $tables[5][0];
        //         $list[] = $tables[6][0];

        //         $renameMap = [
        //             '0' => 'Title',   
        //             '1' => 'Object',
        //             '2' => 'Capital',
        //             '3' => 'The Head Office',
        //             '4' => 'Manager',
        //             '5' => 'Duration',
        //             '6' => 'Deposit',
        //             '7' => 'RCCM Registration'
        //         ];
        //         $list = array_combine(array_map(function($el) use ($renameMap) {
        //             return $renameMap[$el];
        //         }, array_keys($list)), array_values($list));

        //         // dd($list);

        //     }));
          
        // });
        
      


    }
}
