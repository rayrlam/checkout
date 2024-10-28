<?php
namespace Tests\Unit;

use Tests\TestCase;

class EntryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_not_found()
    {
        $payload = [
            'cn' => 'not_found',
        ];

        $this->postJson('api/v1/checking', $payload)
            ->assertStatus(200)
            ->assertExactJson([
                "full_name" => "",
                "department" => []
            ]);
    }

    public function test_test_data_rfid_of_julius_caesar()
    {
        $payload = [
            'cn' => '142594708f3a5a3ac2980914a0fc954f',
        ];

        $this->postJson('api/v1/checking', $payload)
            ->assertStatus(200)
            ->assertExactJson([
                "full_name" => "Julius Caesar",
                "department" => ["director", "development"]      
            ]);
    }

    public function test_test_data_rfid_of_john_deon()
    {
        $payload = [
            'cn' => '3ac2980914a0fc954f142594708f3a5a',
        ];

        $this->postJson('api/v1/checking', $payload)
            ->assertStatus(200)
            ->assertExactJson([
                "full_name" => "John Deon",
                "department" => ["accounting", "HR"]
            ]);
    }

    public function test_test_data_rfid_of_peter_pan()
    {
        $payload = [
            'cn' => '1425947954f08f3a5a3ac2980914a0fc',
        ];

        $this->postJson('api/v1/checking', $payload)
            ->assertStatus(200)
            ->assertExactJson([
                "full_name" => "Peter Pan",
                "department" => ["sales", "sales", "sales"]
            ]);
    }

    public function test_test_data_rfid_of_david_bradley()
    {
        $payload = [
            'cn' => '594708f3a5a3ac2980914a1420fc954f',
        ];

        $this->postJson('api/v1/checking', $payload)
            ->assertStatus(200)
            ->assertExactJson([
                "full_name" => "David Bradley",
                "department" => ["development"]
            ]);
    }

    public function test_test_data_rfid_of_tom_hardy()
    {
        $payload = [
            'cn' => '708f3a5a3ac2142594980914a0fc954f',
        ];

        $this->postJson('api/v1/checking', $payload)
            ->assertStatus(200)
            ->assertExactJson([
                "full_name" => "Tom Hardy",
                "department" => ["development", "development"]
            ]);
    }

    public function test_test_data_rfid_of_mary_berry()
    {
        $payload = [
            'cn' => '954f708f3a5a3ac2142594980914a0fc',
        ];

        $this->postJson('api/v1/checking', $payload)
            ->assertStatus(200)
            ->assertExactJson([
                "full_name" => "Mary Berry",
                "department" => ["headquarters", "development"]
            ]);
    }

    public function test_test_data_rfid_of_left_employee()
    {
        $payload = [
            'cn' => '000f708f3a5a3ac2142594980914a0fc',
        ];

        $this->postJson('api/v1/checking', $payload)
            ->assertStatus(200)
            ->assertExactJson([
                "full_name" => "",
                "department" => []
            ]);
    }
}