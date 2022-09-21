<?php

namespace Tests\Feature;

use App\Http\Livewire\DataTables;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DataTablesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function page_contains_data_tables_livewire_component()
    {
        $this->get('/users')
            ->assertSeeLivewire('data-tables');
    }
    
    /** @test */
    public function datatables_active_checkbox_works()
    {
        $userA = User::create([
            'name' => 'usera',
            'email' => 'usera@usera.com',
            'password' => bcrypt('password'),
            'active' => true
        ]);

        $userB = User::create([
            'name' => 'userb',
            'email' => 'userb@userb.com',
            'password' => bcrypt('password'),
            'active' => false
        ]);

        Livewire::test(DataTables::class)
            ->assertSee($userA->name)
            ->assertDontSee(($userB->name))
            ->set('active', false)
            ->assertSee($userB->name)
            ->assertDontSee($userA->name);
    }

    /** @test */
    public function datatables_searches_name_correctly()
    {
        $userA = User::create([
            'name' => 'usera',
            'email' => 'usera@usera.com',
            'password' => bcrypt('password'),
            'active' => true
        ]);

        $userB = User::create([
            'name' => 'userb',
            'email' => 'userb@userb.com',
            'password' => bcrypt('password'),
            'active' => false
        ]);

        Livewire::test(DataTables::class)
            ->set('search', 'usera')
            ->assertSee($userA->name)
            ->assertDontSee($userB->name);
    }

    /** @test */
    public function datatables_searches_email_correctly()
    {
        $userA = User::create([
            'name' => 'usera',
            'email' => 'usera@usera.com',
            'password' => bcrypt('password'),
            'active' => true
        ]);

        $userB = User::create([
            'name' => 'userb',
            'email' => 'userb@userb.com',
            'password' => bcrypt('password'),
            'active' => false
        ]);

        Livewire::test(DataTables::class)
            ->set('search', 'usera@usera.com')
            ->assertSee($userA->email)
            ->assertDontSee($userB->email);
    }

        /** @test */
        public function datatables_sorts_name_asc_correctly()
        {
            $userC = User::create([
                'name' => 'Cathy C',
                'email' => 'cathy@cathy.com',
                'password' => bcrypt('password'),
                'active' => true,
            ]);
    
            $userA = User::create([
                'name' => 'Andre A',
                'email' => 'andre@andre.com',
                'password' => bcrypt('password'),
                'active' => true,
            ]);
    
            $userB = User::create([
                'name' => 'Brian B',
                'email' => 'brian@brian.com',
                'password' => bcrypt('password'),
                'active' => true,
            ]);
    
            Livewire::test(DataTables::class)
                ->call('sortBy', 'name')
                ->assertSeeInOrder(['Andre A', 'Brian B', 'Cathy C']);
        }
    
        /** @test */
        public function datatables_sorts_name_desc_correctly()
        {
            $userC = User::create([
                'name' => 'Cathy C',
                'email' => 'cathy@cathy.com',
                'password' => bcrypt('password'),
                'active' => true,
            ]);
    
            $userA = User::create([
                'name' => 'Andre A',
                'email' => 'andre@andre.com',
                'password' => bcrypt('password'),
                'active' => true,
            ]);
    
            $userB = User::create([
                'name' => 'Brian B',
                'email' => 'brian@brian.com',
                'password' => bcrypt('password'),
                'active' => true,
            ]);
    
            Livewire::test(DataTables::class)
                ->call('sortBy', 'name')
                ->call('sortBy', 'name')
                ->assertSeeInOrder(['Cathy C', 'Brian B', 'Andre A']);
        }
    
        /** @test */
        public function datatables_sorts_email_asc_correctly()
        {
            $userC = User::create([
                'name' => 'Cathy C',
                'email' => 'cathy@cathy.com',
                'password' => bcrypt('password'),
                'active' => true,
            ]);
    
            $userA = User::create([
                'name' => 'Andre A',
                'email' => 'andre@andre.com',
                'password' => bcrypt('password'),
                'active' => true,
            ]);
    
            $userB = User::create([
                'name' => 'Brian B',
                'email' => 'brian@brian.com',
                'password' => bcrypt('password'),
                'active' => true,
            ]);
    
            Livewire::test(DataTables::class)
                ->call('sortBy', 'email')
                ->assertSeeInOrder(['Andre A', 'Brian B', 'Cathy C']);
        }
    
        /** @test */
        public function datatables_sorts_email_desc_correctly()
        {
            $userC = User::create([
                'name' => 'Cathy C',
                'email' => 'cathy@cathy.com',
                'password' => bcrypt('password'),
                'active' => true,
            ]);
    
            $userA = User::create([
                'name' => 'Andre A',
                'email' => 'andre@andre.com',
                'password' => bcrypt('password'),
                'active' => true,
            ]);
    
            $userB = User::create([
                'name' => 'Brian B',
                'email' => 'brian@brian.com',
                'password' => bcrypt('password'),
                'active' => true,
            ]);
    
            Livewire::test(DataTables::class)
                ->call('sortBy', 'email')
                ->call('sortBy', 'email')
                ->assertSeeInOrder(['Cathy C', 'Brian B', 'Andre A']);
        }
}
