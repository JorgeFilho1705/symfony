<?php
namespace Arca\EmpresaBundle\DataFixtures\ORM;

use Arca\EmpresaBundle\Entity\Empresa;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;



class LoadEmpresa implements FixtureInterface
{
    /**
     * @var ContainerInterface
     */

    public function load(ObjectManager $manager)
    {
        $empresa1 = new Empresa();
        $empresa1->setTitulo('Nutri & Saúde Refeições Coletivas');
        $empresa1->setTelefone('(14) 3227-8954');
        $empresa1->setCep('17010-240');
        $empresa1->setEndereco('R. Virgílio Malta, 16049');
        $empresa1->setCidade('Bauru');
        $empresa1->setEstado('SP');
        $empresa1->setDescricao('Além da prestação de serviços de Alimentação Coletiva, entendemos que parte do nosso papel na sociedade é projetar um mundo melhor.');
        $manager->persist($empresa1);

        $empresa2 = new Empresa();
        $empresa2->setTitulo('Street Food');
        $empresa2->setTelefone('(14) 99723-3971');
        $empresa2->setCep('17054-040');
        $empresa2->setEndereco('Rua Alaska, 10-10');
        $empresa2->setCidade('Bauru');
        $empresa2->setEstado('SP');
        $empresa2->setDescricao('A equipe usa máscaras de proteção');
        $manager->persist($empresa2);

        $empresa3 = new Empresa();
        $empresa3->setTitulo('Oliva Gastronomia');
        $empresa3->setTelefone('(14) 3204-7029');
        $empresa3->setCep('17016-080');
        $empresa3->setEndereco('Av. Comendador José da Silva Martha, 6-44');
        $empresa3->setCidade('Bauru');
        $empresa3->setEstado('SP');
        $empresa3->setDescricao('Desde 2008 a Chef - Prontos e Congelados forneceremos marmitas e marmitex em Bauru, além de deliciosos pratos personalizados, planos para empresas, caldinhos e eventos. Agora vem ao mercado em um novo espaço com nome Oliva Gastronomia');
        $manager->persist($empresa3);

        $empresa4 = new Empresa();
        $empresa4->setTitulo('Sergipano Veiculos');
        $empresa4->setTelefone('(14) 3232-1701');
        $empresa4->setCep('17010-170');
        $empresa4->setEndereco('Centro');
        $empresa4->setCidade('Bauru');
        $empresa4->setEstado('SP');
        $empresa4->setDescricao('Revendedora de carros usados em Bauru, São Paulo');
        $manager->persist($empresa4);

        $empresa5 = new Empresa();
        $empresa5->setTitulo('Localiza Aluguel de Carros - Agência Bauru');
        $empresa5->setTelefone('0800 979 2020');
        $empresa5->setCep('17012-202');
        $empresa5->setEndereco('Av. Nações Unidas, 31-40');
        $empresa5->setCidade('Bauru');
        $empresa5->setEstado('SP');
        $empresa5->setDescricao('Quer alugar um carro fácil vá lá excelente atendimento e ótima prestação de serviço');
        $manager->persist($empresa5);

        $empresa6 = new Empresa();
        $empresa6->setTitulo('Rocha Rentacar Locação de Veículos');
        $empresa6->setTelefone('(14) 99718-4816');
        $empresa6->setCep('17055-175');
        $empresa6->setEndereco('Av. Maria Ranieri, 5-40');
        $empresa6->setCidade('Bauru');
        $empresa6->setEstado('SP');
        $empresa6->setDescricao('Agência de aluguel de carros em Bauru, São Paulo');
        $manager->persist($empresa6);

        $empresa7 = new Empresa();
        $empresa7->setTitulo('Leorri Viagens e Turismo (Bauru Shopping)');
        $empresa7->setTelefone('(14) 3202-6757');
        $empresa7->setCep('17011-900');
        $empresa7->setEndereco('Rua Henrique Savi, 15-55');
        $empresa7->setCidade('Bauru');
        $empresa7->setEstado('SP');
        $empresa7->setDescricao('É obrigatório usar máscara de proteção · É feita uma medição de temperatura · A equipe usa máscaras de proteção · A equipe passa por uma medição de temperatura · Desinfecção das superfícies entre um cliente e outro');
        $manager->persist($empresa7);

        $empresa8 = new Empresa();
        $empresa8->setTitulo('CVC Hiper Big Bauru');
        $empresa8->setTelefone('(14) 99146-1566');
        $empresa8->setCep('17012-646');
        $empresa8->setEndereco('Rua Chaim Mauad, Qudra 100, 2 Loja 07');
        $empresa8->setCidade('Bauru');
        $empresa8->setEstado('SP');
        $empresa8->setDescricao('Tudo em Até 12x Sem Juros e Saindo da Sua Cidade.');
        $manager->persist($empresa8);

        $empresa9 = new Empresa();
        $empresa9->setTitulo('Romamia Viagens e Turismo');
        $empresa9->setTelefone('(14) 99149-9886');
        $empresa9->setCep('17055-150');
        $empresa9->setEndereco('R. Mário Gonzaga Junqueira, 25-80 - BLOCO 10 APTO 43');
        $empresa9->setCidade('Bauru');
        $empresa9->setEstado('SP');
        $empresa9->setDescricao('Viagem a lazer, corporativa, aéreos, hotéis, seguros, aluguel de carros, navio e traslados.');
        $manager->persist($empresa9);

        $empresa10 = new Empresa();
        $empresa10->setTitulo('Globo Sports');
        $empresa10->setTelefone('(14) 3366-5555');
        $empresa10->setCep('17010-250');
        $empresa10->setEndereco('R. Azarias Leite, 8-15');
        $empresa10->setCidade('Bauru');
        $empresa10->setEstado('SP');
        $empresa10->setDescricao('Loja completa em todos os esporte como Futebol, Aquáticos (Natação, Polo, Hidroginástica), Basquete, Tênis, Volei, Premiação (troféus e medalhas), Aparelhos de Ginastica (Residencial e Profissional), Cross Fit, Pilates, Jogos de Salão (Tênis de Mesa, Mesa de carteado, Mesa de Bilhar, Pebolim) e muito mais.');
        $manager->persist($empresa10);

        $empresa11 = new Empresa();
        $empresa11->setTitulo('Boulevard Shopping Bauru');
        $empresa11->setTelefone('(14) 3500-8951');
        $empresa11->setCep('17013-113');
        $empresa11->setEndereco('R. Marcondes Salgado, 11-39');
        $empresa11->setCidade('Bauru');
        $empresa11->setEstado('SP');
        $empresa11->setDescricao('O Boulevard Shopping Bauru é o mais completo shopping center do interior de São Paulo. Com localização privilegiada, atende não só o município de Bauru, mas também 39 municípios da região com uma estrutura ampla, moderna e confortável.');
        $manager->persist($empresa11);

        $empresa12 = new Empresa();
        $empresa12->setTitulo('Bauru Shopping');
        $empresa12->setTelefone('(14) 3366-5000');
        $empresa12->setCep('17011-900');
        $empresa12->setEndereco('R. Henrique Savi, 15- 55 ');
        $empresa12->setCidade('Bauru');
        $empresa12->setEstado('SP');
        $empresa12->setDescricao('Shopping espaçoso de vários andares com lojas variadas, restaurantes e cinema.');
        $manager->persist($empresa12);

        $manager->flush();
    }
}