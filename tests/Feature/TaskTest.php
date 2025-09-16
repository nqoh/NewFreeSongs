<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    protected  $user , $task ; 

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->task = Task::factory(10)->create();
    }

    public function test_user_can_register(): void
    {
        
      $user  = User::factory()->make();
      $response = $this->postJson('api/v1/auth/register', ['name'=>$user->name , 'email'=> $user->email, 'password' => $user->password, 'password_confirmation' => $user->password]);
      $response->assertStatus(201);
    }

    public function test_user_can_login(): void
    {
        $response = $this->postJson('api/v1/auth/login', ['email' => $this->user->email , 'password' => 'password']);
        $response->assertStatus(200);  
    }

    public function test_user_can_view_tasks(): void
    {
         $response = $this->actingAs($this->user)->getJson('/api/v1/tasks');
         $response->assertStatus(200);
    }

    public function test_user_can_create_task():void
    {
        $task = Task::factory()->make();
        $response = $this->actingAs($this->user)->postJson('api/v1/tasks' ,  $task->toArray());
        $response->assertStatus(201);
        $this->assertDatabaseHas('tasks', ['name' =>$task->name]);
    }

    public function test_user_can_view_one_task():void
    {
        $response= $this->actingAs($this->user)->getJson('api/v1/tasks/'.$this->task->last()->id);
        $response->assertStatus(200);
        $response->json();
    }

    public function test_user_can_update_task():void
    {
        $response = $this->actingAs($this->user)->patchJson('api/v1/tasks/'.$this->task->last()->id, ['name'=>'Ngobese']);
        $response->assertStatus(200);
        $this->assertDatabaseHas('tasks', ['name' => 'Ngobese']);
    }
    

    public function test_user_can_access_testing_route():void
    {
         $user1 = User::factory()->create(['is_admin' => 1]);
         $response = $this->actingAs($user1)->getJson('api/v1/testing');
         $response->assertStatus(200);
    }

    public function test_task_can_deleted():void
    {
        $response=$this->actingAs($this->user)->deleteJson('api/v1/tasks/'. $this->task->last()->id);
        $response->assertStatus(204);
        $this->assertDatabaseMissing('tasks',  $this->task->last()->toArray());
    }
}
