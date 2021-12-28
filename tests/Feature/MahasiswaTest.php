<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Generator as Faker;
use App\User;
use App\Models\Mahasiswa;
use App\Models\Anggota;
use App\Models\DosenPendamping;
use Carbon\Carbon;


class MahasiswaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    use WithFaker;

    // public function setUp()
    // {
    //     parent::setUp();
    //     $user = User::factory()->state([
    //         'role_id'=>4
    //     ])->has(
    //         Mahasiswa::factory()
    //         ->state(function (array $attributes, User $user){
    //             return ['users_id'=>$user->id];
    //         })
    //     )->create();
    // }
    public function test_get_profile()
    {
        $user = User::factory()->state([
            'role_id'=>4
        ])->has(
            Mahasiswa::factory()
            ->state(function (array $attributes, User $user){
                return ['users_id'=>$user->id];
            })
        )->create();
        $response = $this->actingAs($user)->get('/mahasiswa/profile');

        $response->assertStatus(200);
    }

    public function test_tambah_anggota()
    {
        $user = User::factory()->state([
            'role_id'=>4
        ])->has(
            Mahasiswa::factory()
            ->state(function (array $attributes, User $user){
                return ['users_id'=>$user->id];
            })
        )->create();
        // $anggota = Anggota::factory()->create();
        // $mahasiswa = Mahasiswa::factory()->state(['users_id'=>$user->id])->create();
        $anggota = [
            'npm_anggota'=>$this->faker->randomNumber(3),
            'nama_anggota'=>$this->faker->name(),
            'npm_mahasiswa'=>$this->faker->randomNumber(3)
        ];
        $response = $this->actingAs($user)->post('/mahasiswa/tambah_anggota',$anggota);

        $response->assertStatus(302);
        $response->assertRedirect('/mahasiswa/profile');
    }
    public function test_edit_anggota()
    {
        $user = User::factory()->state([
            'role_id'=>4
        ])->has(
            Mahasiswa::factory()
            ->state(function (array $attributes, User $user){
                return ['users_id'=>$user->id];
            })
        )->create();
        $anggota = Anggota::factory()->create();
        
        $response = $this->actingAs($user)->post(route('edit-anggota',['npm_anggota'=>$anggota->npm_anggota]),[
            'npm_anggota'=>$this->faker->randomNumber(3),
            'nama_anggota'=>$this->faker->name(),
        ]);

        $response->assertStatus(302);
    }

   
    public function test_konsultasi_pendamping()
    {
        $user = User::factory()->state([
                    'role_id'=>4
                ])->has(
                    Mahasiswa::factory()
                    ->state(function (array $attributes, User $user){
                        return ['users_id'=>$user->id];
                    })
                )->create();
        $response = $this->actingAs($user)->get(route('mahasiswa-konsultasi_dosbim'));
        $response->assertStatus(200);
    }
    public function test_tambah_pendamping()
    {
        $user = User::factory()->state([
                    'role_id'=>4
                ])->has(
                    Mahasiswa::factory()
                    ->state(function (array $attributes, User $user){
                        return ['users_id'=>$user->id];
                    })
                )->create();
        $pendamping = DosenPendamping::factory()->state([
            'users_id'=>$user->id
        ])->create();
        $response = $this->actingAs($user)->post(route('request-pendamping',[
            'npm_mahasiswa'=>$user->mahasiswa->npm_mahasiswa,
            'nip_pendamping'=>$pendamping->nip_pendamping,
            'status'=>true //for testing true, not testing null
        ]));
        $response->assertStatus(302);
    }
    public function test_hasil_bimbingan()
    {
        $user = User::factory()->state([
                    'role_id'=>4
                ])->has(
                    Mahasiswa::factory()
                    ->state(function (array $attributes, User $user){
                        return ['users_id'=>$user->id];
                    })
                )->create();
        $pendamping = DosenPendamping::factory()->state([
            'users_id'=>$user->id
        ])->create();
        $response = $this->actingAs($user)->post(route('mahasiswa-kegiatan_bimbingan'),[
            'tanggal'=>$this->faker->date(),
            'hasil_diskusi'=>$this->faker->word(),
            'npm_mahasiswa'=>$user->mahasiswa->npm_mahasiswa,
            'nip_pendamping'=>$this->faker->randomNumber(3)
        ]);
        $response->assertStatus(302);
    }
    public function test_halaman_upload_proposal()
    {
        $user = User::factory()->state([
            'role_id'=>4
        ])->has(
            Mahasiswa::factory()
            ->state(function (array $attributes, User $user){
                return ['users_id'=>$user->id];
            })
        )->create();
        $response = $this->actingAs($user)->get(route('mahasiswa-upload_proposal'));
        $response->assertStatus(200);
    }
    public function test_upload_proposal()
    {
        $user = User::factory()->state([
            'role_id'=>4
        ])->has(
            Mahasiswa::factory()
            ->state(function (array $attributes, User $user){
                return ['users_id'=>$user->id];
            })
        )->create();
        $response = $this->actingAs($user)->get(route('mahasiswa-upload_proposal'));
        $response->assertStatus(200);
    }
}
