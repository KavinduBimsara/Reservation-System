<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CustomersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test  */
    public function un_authenticated_user_cannot_see_customer()
    {

        $response = $this->get('admin/customers');

        $response->assertRedirect('/login');
    }

    /** @test  */
    public function authenticated_user_can_see_customers()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('admin/customers/datatable');

        $response->assertStatus(200);

    }

    /** @test  */
    public function authenticated_user_can_see_customers_index_view()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('admin/customers');

        $response->assertStatus(200);
    }


}
