<?php

namespace App\Console\Commands;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Console\Command;

class CreateComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:comments
                            {user : The user id of type integer required}
                            {comment* : A comment of type string  at least one required but can be many }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add comments';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userId = $this->argument('user');
        $text = $this->argument('comment');
        $validator = Validator::make([
            'user' => $userId,
            'comment' => $text,
        ],
        [
            'user' => ['required', 'integer'],
            'comment' => ['array','required']
        ],
        [
            'user.required' => 'Missing user id',
            'user.integer' => 'User integer expected, different type received',
            'comment.array' => 'Comment type array expected but ...'
         ]

        );

        if($validator->fails()){
            $this->alert($validator->messages());
        }

        try{
            User::findOrFail($userId);
            $data = [];
            foreach($text as $value){
                $data[] = [
                    'user_id' => $userId,
                    'text' => $value
                ];
            }

          Comment::insert($data);

        }catch(\Exception $e){
            $this->alert($e->getMessage());
        }

        $this->info('Comment created succesfully');

    }
}
