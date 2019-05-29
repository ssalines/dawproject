<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;
use App\Role;
use App\Operation;
use App\User;

class EditParticipantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit_participant(Operation $operation, Request $request){

        $users = User::all();

        $participant = Participant::all();

        $roles = Role::all();

        $cont = 0;

        return view('participant.edit_participant', compact('operation', 'participant', 'roles', 'cont', 'users'));

    }

    public function update_participant(Operation $operation, Request $request){

        $participant = Participant::all();


        $role0 = $request->participant_role0;
        $role1 = $request->participant_role1;
        $role2 = $request->participant_role2;
        $role3 = $request->participant_role3;
        $role4 = $request->participant_role4;
        $role5 = $request->participant_role5;
        $role6 = $request->participant_role6;
        $role7 = $request->participant_role7;
        $role8 = $request->participant_role8;
        $role9 = $request->participant_role9;
        $role10 = $request->participant_role10;
        $role11 = $request->participant_role11;
        $role12 = $request->participant_role12;
        $role13 = $request->participant_role13;

        $user0 = $request->participant_user0;
        $user1 = $request->participant_user1;
        $user2 = $request->participant_user2;
        $user3 = $request->participant_user3;
        $user4 = $request->participant_user4;
        $user5 = $request->participant_user5;
        $user6 = $request->participant_user6;
        $user7 = $request->participant_user7;
        $user8 = $request->participant_user8;
        $user9 = $request->participant_user9;
        $user10 = $request->participant_user10;
        $user11 = $request->participant_user11;
        $user12 = $request->participant_user12;
        $user13 = $request->participant_user13;

        $part0 = $request->part_id0;
        $part1 = $request->part_id1;
        $part2 = $request->part_id2;
        $part3 = $request->part_id3;
        $part4 = $request->part_id4;
        $part5 = $request->part_id5;
        $part6 = $request->part_id6;
        $part7 = $request->part_id7;
        $part8 = $request->part_id8;
        $part9 = $request->part_id9;
        $part10 = $request->part_id10;
        $part11 = $request->part_id11;
        $part12 = $request->part_id12;
        $part13 = $request->part_id13;



        if($role0 != 0 && $user0 != 0){

            $part = Participant::find($part0);

            $request->request->add(['role_id' => $role0]);
            $request->request->add(['user_id' => $user0]);

            $part->update(request(['user_id', 'role_id']));

        }

        if($role1 != 0 && $user1 != 0){

            $part = Participant::find($part1);

            $request->request->add(['role_id' => $role1]);
            $request->request->add(['user_id' => $user1]);

            $part->update(request(['user_id', 'role_id']));
        }

        if($role2 != 0 && $user2 != 0){

            $part = Participant::find($part2);

            $request->request->add(['role_id' => $role2]);
            $request->request->add(['user_id' => $user2]);

            $part->update(request(['user_id', 'role_id']));
        }

        if($role3 != 0 && $user3 != 0){

            $part = Participant::find($part3);

            $request->request->add(['role_id' => $role3]);
            $request->request->add(['user_id' => $user3]);

            $part->update(request(['user_id', 'role_id']));
        }

        if($role4 != 0 && $user4 != 0){

            $part = Participant::find($part4);

            $request->request->add(['role_id' => $role4]);
            $request->request->add(['user_id' => $user4]);

            $part->update(request(['user_id', 'role_id']));
        }

        if($role5 != 0 && $user5 != 0){

            $part = Participant::find($part5);

            $request->request->add(['role_id' => $role5]);
            $request->request->add(['user_id' => $user5]);

            $part->update(request(['user_id', 'role_id']));
        }

        if($role6 != 0 && $user6 != 0){

            $part = Participant::find($part6);

            $request->request->add(['role_id' => $role6]);
            $request->request->add(['user_id' => $user6]);

            $part->update(request(['user_id', 'role_id']));
        }

        if($role7 != 0 && $user7 != 0){

            $part = Participant::find($part7);

            $request->request->add(['role_id' => $role7]);
            $request->request->add(['user_id' => $user7]);

            $part->update(request(['user_id', 'role_id']));
        }

        if($role8 != 0 && $user8 != 0){

            $part = Participant::find($part8);

            $request->request->add(['role_id' => $role8]);
            $request->request->add(['user_id' => $user8]);

            $part->update(request(['user_id', 'role_id']));
        }

        if($role9 != 0 && $user9 != 0){

            $part = Participant::find($part9);

            $request->request->add(['role_id' => $role9]);
            $request->request->add(['user_id' => $user9]);

            $part->update(request(['user_id', 'role_id']));
        }

        if($role10 != 0 && $user10 != 0){

            $part = Participant::find($part10);

            $request->request->add(['role_id' => $role10]);
            $request->request->add(['user_id' => $user10]);

            $part->update(request(['user_id', 'role_id']));
        }

        if($role11 != 0 && $user11 != 0){

            $part = Participant::find($part11);

            $request->request->add(['role_id' => $role11]);
            $request->request->add(['user_id' => $user11]);

            $part->update(request(['user_id', 'role_id']));
        }

        if($role12 != 0 && $user12 != 0){

            $part = Participant::find($part12);

            $request->request->add(['role_id' => $role12]);
            $request->request->add(['user_id' => $user12]);

            $part->update(request(['user_id', 'role_id']));
        }

        if($role13 != 0 && $user13 != 0){

            $part = Participant::find($part13);

            $request->request->add(['role_id' => $role13]);
            $request->request->add(['user_id' => $user13]);

            $part->update(request(['user_id', 'role_id']));
        }

        return redirect('/operations');

    }
}
