<?php
namespace Tests\Unit;

use Tests\TestCase;

class InvoiceTest extends TestCase
{
    public function test_welcome_page_can_be_rendered()
    {
        $response = $this->get('/tasks/invoice/index');
        $response->assertStatus(200);
        $response->assertSee('Invoice');
        $response->assertSee('Create an Application that connects to MySQL');
    }

    public function test_headers_page_can_be_rendered()
    {
        $response = $this->get('/tasks/invoice/headers');
        $response->assertStatus(200);
        $response->assertSee('LOCATION 001');
        $response->assertSee('LOCATION 002');
    }

    public function test_location_page_can_be_rendered()
    {
        $response = $this->get('/tasks/invoice/location');
        $response->assertStatus(200);
        $response->assertSee('draft');
        $response->assertSee('open');
        $response->assertSee('processed');
    }

    public function test_total_page_can_be_rendered()
    {
        $response = $this->get('/tasks/invoice/total');
        $response->assertStatus(200);
        $response->assertSee('Total');
        $response->assertSee('Quantity');
    }

    public function test_get_headers()
    {
        $data = ['data'=>[
                    ['date'=>'2020-01-01','name'=>'LOCATION 001','status'=>'draft','total_value'=>'13.00'],
                    ['date'=>'2020-01-01','name'=>'LOCATION 001','status'=>'open','total_value'=>'29.00'],
                    ['date'=>'2020-01-01','name'=>'LOCATION 002','status'=>'processed','total_value'=>'1.00']]];
    
        $response = $this->postJson('/api/v1/get_headers', []);
        $response->assertStatus(200)->assertExactJson($data);
    }
    
    public function test_get_headers_date_out_of_range()
    {
        $payload = ['date'=>['2010-01-01','2012-01-01']];

        $data = ['data'=>[]];
        $response = $this->postJson('/api/v1/get_headers', $payload);
        $response->assertStatus(200)->assertExactJson($data);
    }
    
    public function test_get_headers_date_in_range()
    {
        $payload = ['date'=>['2020-01-01','2020-02-01']];

        $data = ['data'=>[
            ['date'=>'2020-01-01','name'=>'LOCATION 001','status'=>'draft','total_value'=>'13.00'],
            ['date'=>'2020-01-01','name'=>'LOCATION 001','status'=>'open','total_value'=>'29.00'],
            ['date'=>'2020-01-01','name'=>'LOCATION 002','status'=>'processed','total_value'=>'1.00']]];

        $response = $this->postJson('/api/v1/get_headers', $payload);
        $response->assertStatus(200)->assertExactJson($data);
    } 

    public function test_get_headers_status_open()
    {
        $payload = ['status'=>'open'];

        $data = ['data'=>[['date'=>'2020-01-01','name'=>'LOCATION 001','status'=>'open','total_value'=>'29.00']]];

        $response = $this->postJson('/api/v1/get_headers', $payload);
        $response->assertStatus(200)->assertExactJson($data);
    }
    
    public function test_get_headers_location_001()
    {
        $payload = ['location'=>'LOCATION 001'];

        $data = ['data'=>[
            ['date'=>'2020-01-01','name'=>'LOCATION 001','status'=>'draft','total_value'=>'13.00'],
            ['date'=>'2020-01-01','name'=>'LOCATION 001','status'=>'open','total_value'=>'29.00']]];

        $response = $this->postJson('/api/v1/get_headers', $payload);
        $response->assertStatus(200)->assertExactJson($data);
    } 

    public function test_location_id_1()
    {
        $payload = [
            'location_id' => '1',
        ];

        $data = [];
       
        $data['data'][0]['status'] = 'draft';
        $data['data'][0]['total_value'] = '13.00';

        $data['data'][1]['status'] = 'open';
        $data['data'][1]['total_value'] = '29.00';
        
        $response = $this->postJson('/api/v1/location_id', $payload);        
        $response->assertStatus(200)->assertExactJson($data);
    }

    public function test_location_id_2()
    {
        $payload = [
            'location_id' => '2',
        ];

        $data = [];
       
        $data['data'][0]['status'] = 'processed';
        $data['data'][0]['total_value'] = '1.00';    

        $response = $this->postJson('/api/v1/location_id', $payload);
        $response->assertStatus(200)->assertExactJson($data);
    }

    public function test_location_id_3()
    {
        $payload = [
            'location_id' => '3',
        ];

        $data = ['data'=>[]];
       
        $response = $this->postJson('/api/v1/location_id', $payload);
        $response->assertStatus(200)->assertExactJson($data);
    }    
}