<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller

{
    // tutti i film
    public function getFilms(){
        return Film::all();
    }
    
    // ottenere tutti i film in base al giorno della settimana

    public function getFilmsByDayOfWeek( $day_of_week){
       // $day = Film::find($day_of_week);
        $day = Film::where('day_of_the_week','=',$day_of_week)->get();
        return (!empty($day_of_week)) ? response()->json($day) : response()->json(["message "=>"Non ci sono film in questo giorno"]);
       //  return response()->json($day_of_week);
    }
    // get film by id 
  /*   public function getById($id){
        $day = Film::where('id','=',$id)

    } */
    // post 
    public function postFilm(Request  $req){
        $req->validate([
            'film_name'=>'required',
            'day_of_the_week'=>'required',
            'channel'=>'required',
            'image'=>'required',
            'episode_number'=>'required'
        ]);
        $film = new Film;
        $film->film_name = $req->input('film_name');
        $film->day_of_the_week= $req->input('day_of_the_week');
        $film->channel = $req->input('channel');
        $film->image = $req->input('image');
        $film->episode_number =  $req->input('episode_number');
        
        $film->save();
        return response()->json([
            "message" => "Film Add"
        ],201);

    }
    public function deleteFilm($id){
        if(Film::where('id',$id)->exists()){
            $film = Film::find($id);
            $film->delete();
            return response()->json([
                "message"=>"record deleted"
            ],202);
        }else{
            return response()->josn([
                "message" =>"film not found"
            ],404);
        }

    }
    public function putFilm( Request $req,$id){
        if(Film::where('id',$id)->exists()){
            $film = Film::find($id);
            $req->validate([
            
            'episode_number'=>'required'
            ]);
            
            $film->episode_number =  $req->input('episode_number');
            $film->save();
            return response()->json([
                "message" => " Film Updated"
            ], 200);
        }else{
            return response()->json([
                "message" => "Film  Not Found"
            ], 404); 
        }

    }
    public function getFilmByid($id){
        if(Film::where('id',$id)->exists()){
          $film= Student::find($id);
          return response()->json($film);
      }else{
        return responce()->json([ "message" => "student not found"],404);
      }
      }

}


