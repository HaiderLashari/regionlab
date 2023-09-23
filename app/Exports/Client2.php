<?php

namespace App\Exports;
use App\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Client2 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // protected $ids;

    // public function __construct(array $ids)
    // {
    // 	$this->ids = $ids;
    // }
    public function collection()
    {
    	$client = Client::all()->toArray();
    	$new = [];
    	foreach ($client as $key => $value) {
    		$new_array = [];
    		$new_array['lead_id'] = $value['lead_id'];
    		$new_array['time_of_cell'] = $value['time_of_cell'];
    		$new_array['person_responsible'] = $value['person_responsible'];
    		$new_array['status'] = $value['status'];
    		$new_array['name'] = $value['name'];
    		$new_array['email'] = $value['email'];
    		$new_array['phone'] = $value['phone'];
    		$new_array['address'] = $value['address'];
    		$new_array['company'] = $value['company'];
    		$new_array['position'] = $value['position'];
    		$new_array['other_email'] = $value['other_email'];
    		$new_array['other_phone'] = $value['other_phone'];
    		$new_array['comment'] = $value['comment'];
    		$new_array['type'] = $value['type'];
    		$new_array['country_of_residence'] = $value['country_of_residence'];
    		$new_array['nationality'] = $value['nationality'];
    		$jsonString = $value['addtional_detail'];
    		$dataArray = json_decode($jsonString, true);


    		// 

    		$arr = [
    			'Lead ID',
    			'Time of Call',
    			'Person Responsible',
    			'Status',
    			'Name',
    			'Work E-mail',
    			'Work Phone',
    			'Address',
    			'Company Name',
    			'Position',
    			'Other E-mail',
    			'Other Phone Number',
    			'Comments',
    			'Type',
    			'Country',
    			'Nationality',
    		];

    		// 
    		// dd($dataArray);
    		if(@$dataArray){
    			
    		foreach ($dataArray as $key2 => $dataArr) {
    			// dd($key2)
    			$new_array[$key2] = $dataArr;
    			$arr[] = $key2;
    		}
    		}
    		// dd($arr);
    		$new[] = $new_array;
    	}
    	
    	$dataCollection = collect([$arr])->concat($new);
    	// $dataCollection = collect($new);
    // dd($dataCollection);
    // return $new;
    	return $dataCollection;
    }

    // public function headings(): array
    // {
    //     // Define the header row here
    // 	return [
    // 		'Lead ID',
    // 		'Time of Call',
    // 		'Person Responsible',
    // 		'Status',
    // 		'Name',
    // 		'Work E-mail',
    // 		'Work Phone',
    // 		'Address',
    // 		'Company Name',
    // 		'Position',
    // 		'Other E-mail',
    // 		'Other Phone Number',
    // 		'Comments',
    // 		'Type',
    // 		'Country',
    // 		'Nationality',
    // 		'Age',
    // 	];
    // }
}
