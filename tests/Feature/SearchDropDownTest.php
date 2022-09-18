<?php

namespace Tests\Feature;

use App\Http\Livewire\SearchDropDown;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SearchDropDownTest extends TestCase
{
    /** @test */
    public function page_contains_contact_form_livewire_component()
    {
        $this->get('/search')
            ->assertSeeLivewire('search-drop-down');
    }
    /** @test */ 
    public function search_dropdown_searches_correctly_if_song_exists()
    {
        Livewire::test(SearchDropDown::class)
            ->assertDontSee('John Lennon')
            ->set('search', 'Imagine')
            ->assertSee('John Lennon');
    }

    /** @test */ 
    public function search_dropdown_show_message_if_no_results_are_found()
    {
        Livewire::test(SearchDropDown::class)
            ->set('search', 'gewgwigwhighwighw')
            ->assertSee('No results found for');
    }
}
