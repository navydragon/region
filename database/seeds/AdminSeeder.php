<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('filials')->insert(['name'=>'МИИТ']);
         DB::table('filials')->insert(['name'=>'Дирекция тяги']);
         DB::table('jobs')->insert(['name'=>'Главный инженер']);
         DB::table('jobs')->insert(['name'=>'НБТ']);

         factory(App\User::class, 1)->create([
            'surname' => 'Гринчар',
            'name' => 'Николай',
            'fathername' => 'Николаевич',
            'email' => 'ief07@bk.ru',
            'password' => bcrypt('111111'),
            'remember_token' => str_random(10),
            'filial_id' => 1,
            'job_id' => 1,
            ]);
      

         factory(App\Survey::class, 2)->create(['user_id'=>1])->each(function($u) 
         {
             factory(App\Survey_question::class,5)->create(['survey_id'=>$u->id]);
         });

         factory(App\Task::class, 2)->create(['user_id'=>1])->each(function($u) 
         {

             $f = factory(App\File::class,1)->create(['user_id'=>'1','path'=>'/file.txt','title'=>'file-task#'.$u->id]);
                  factory(App\File_bind::class,1)->create(['file_id'=>$f->id,'bind_type'=>'task','type_id'=>$u->id]);
         });

          factory(App\Test::class, 2)->create(['user_id'=>1])->each(function($u) 
         {
             factory(App\Question::class,5)->create(['test_id'=>$u->id])->each(function($q) 
             {
                factory(App\Answer::class,3)->create(['question_id'=>$q->id,'right'=>'0']);
                factory(App\Answer::class,1)->create(['question_id'=>$q->id,'right'=>'1']);
             });
         });

           factory(App\Commission::class, 1)->create(['user_id'=>1])->each(function($u) 
         {
            $f = factory(App\File::class,1)->create(['user_id'=>'1','path'=>'/file.txt','title'=>'file-commission#'.$u->id]);
            factory(App\File_bind::class,1)->create(['file_id'=>$f->id,'bind_type'=>'commission','type_id'=>$u->id]);

            factory(App\Commission_stage::class, 1)->create(['title'=>'Подготовительный этап','commission_id'=>$u->id,'start_at'=>'2016-03-01','end_at'=>'2016-03-14']);
            factory(App\Commission_stage::class, 1)->create(['title'=>'Основный этап','commission_id'=>$u->id,'start_at'=>'2016-03-15','end_at'=>'2016-03-30']);
         });

           factory(App\Event::class, 1)->create(['commission_stage_id'=>1,'type'=>'survey','type_id'=>'1']);
           factory(App\Event::class, 1)->create(['commission_stage_id'=>1,'type'=>'survey','type_id'=>'2']);
           factory(App\Event::class, 1)->create(['commission_stage_id'=>1,'type'=>'task','type_id'=>'1']);
            
           factory(App\Event::class, 1)->create(['commission_stage_id'=>2,'type'=>'test','type_id'=>'1']); 
           factory(App\Event::class, 1)->create(['commission_stage_id'=>2,'type'=>'test','type_id'=>'2']); 
           factory(App\Event::class, 1)->create(['commission_stage_id'=>2,'type'=>'task','type_id'=>'2']);
    }   
}
