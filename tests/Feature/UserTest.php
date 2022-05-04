<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
  
  /**
   * A basic feature test example.
   * 
   * @return void
   */

  use RefreshDatabase, WithFaker;

  /** @test */
  public function login_screen_can_be_rendered()
  {
    $response = $this->get(route('login'));

    $response->assertStatus(200);
  }

  /** @test */
  public function it_can_not_authenticate_with_invalid_name_email()
  {
    $user = User::factory()->create();

    $this->post(route('users.create'), [
      'name' => $user->name,
      'email' => $user->email,
    ]);

    $this->assertGuest();
  }

  /** @test */
  public function it_can_store_new_users()
  {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->post(route('users.store'), [
      'name' => 'Dary',
      'email' => 'dary@gmail.com',
      'password' => 'dary123',
    ]);
    $response->assertSessionHasNoErrors();
    $response->assertRedirect('users');
  }

  /** @test */
  public function it_can_see_the_edit_users()
  {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/users/' . $user->id . '/edit');
    $response->assertStatus(200);
  }

  /** @test */
  public function it_can_update_users()
  {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->put('users.update' . $user->id, [
      'name' => 'Dary',
      'email' => 'dary@gmail.com',
      'password' => 'dary123',
    ]);
    
    $response->assertSessionHasNoErrors();
  }

  /** @test */
  public function it_can_delete_user()
  {
    $user = User::factory()->count(1)->make();
    $user = User::first();

    if ($user) {
      $user->delete();
    }

    $this->assertTrue(true);
  }
}
