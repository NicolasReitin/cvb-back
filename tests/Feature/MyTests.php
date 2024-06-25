<?php

use App\Models\Actualite;
use App\Models\User;

use function Pest\Laravel\getJson;

describe('HomePage data', function() {

    test('that the application homepage returns a successful response', function () {
        // $response = $this->get('/');
        $response = getJson('/')
            ->assertStatus(200);

        expect($response->json('name'))->toEqual('Romain');
    });

    it('returns a successful response when visiting the homepage', function () {
        $response = $this->get('/');
    
        $response->assertStatus(200);
    });

    test('create and delete user', function () {
        $user = User::factory()->create();

        expect(User::find($user->id))->not()->toBeNull();

        $user->delete();

        expect(User::find($user->id))->toBeNull();

    });

    test('create and delete actualite', function () {
        $actualite = Actualite::factory()->create();

        expect(Actualite::find($actualite->id))->not()->toBeNull();

        $actualite->delete();

        expect(User::find($actualite->id))->toBeNull();

    });
});
