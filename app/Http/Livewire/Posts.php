<?php

namespace App\Http\Livewire;

use App\Models\post;
use Livewire\Component;
use Livewire\WithPagination;

class posts extends Component
{
    // use WithPagination;

    // protected $paginationTheme = 'bootstrap';

    public $posts, $title, $body, $post_id;
    public $updateMode = false;

    public function render()
    {
        $this->posts = post::all();
        return view('livewire.posts');
    }

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    private function resetInputFields(){

        $this->title = '';

        $this->text = '';

    }

   

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function store()

    {

        $validatedDate = $this->validate([

            'title' => 'required',

            'text' => 'required',

        ]);

  

        post::create($validatedDate);

  

        session()->flash('message', 'post Created Successfully.');

  

        $this->resetInputFields();

    }

  

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function edit($id)

    {

        $post = post::findOrFail($id);

        $this->post_id = $id;

        $this->title = $post->title;

        $this->text = $post->text;

  

        $this->updateMode = true;

    }

  

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function cancel()

    {

        $this->updateMode = false;

        $this->resetInputFields();

    }

  

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function update()

    {

        $validatedDate = $this->validate([

            'title' => 'required',

            'text' => 'required',

        ]);

  

        $post = post::find($this->post_id);

        $post->update([

            'title' => $this->title,

            'text' => $this->text,

        ]);

  

        $this->updateMode = false;

  

        session()->flash('message', 'post Updated Successfully.');

        $this->resetInputFields();

    }

   

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function delete($id)

    {

        post::find($id)->delete();

        session()->flash('message', 'post Deleted Successfully.');

    }
}
