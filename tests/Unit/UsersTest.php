<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        // Cria alguns itens de exemplo
        User::factory()->count(3)->create();

        // Faz a solicitação para o endpoint de listagem de itens
        $response = $this->getJson('/api/users');

        // Verifica se a resposta tem o status 200 (OK)
        $response->assertStatus(200);

        // Verifica se a resposta é um JSON contendo os itens criados
        $response->assertJsonCount(3);
    }

    public function test_show()
    {
        // Cria um item de exemplo
        $user      = User::factory()->create();

        // Faz a solicitação para o endpoint de visualização de um item específico
        $response   = $this->getJson('/api/users/' . $user->id);

        // Verifica se a resposta tem o status 200 (OK)
        $response->assertStatus(200);

        // Verifica se a resposta contém os dados do item criado
        $response->assertJson([
            'id'            => $user->id,
            'name'          => $user->name,
            'email'         => $user->email,
        ]);
    }
}
