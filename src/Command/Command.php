<?php

namespace App\Command;

use App\Fixtures\Bar;
use App\Fixtures\Foo;
use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;

class Command extends BaseCommand
{
    public function configure()
    {
        $this->setName('reproducer');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $sf = new SymfonyStyle($input, $output);

        $reflectionExtractor = new ReflectionExtractor();
        $phpDocExtractor = new PhpDocExtractor();
        $propertyInfoExtractor = new PropertyInfoExtractor(
            [$reflectionExtractor],
            [$phpDocExtractor, $reflectionExtractor],
            [$reflectionExtractor],
            [$reflectionExtractor]
        );

        dump($propertyInfoExtractor->getTypes(Foo::class, 'property'));
        dump($propertyInfoExtractor->getTypes(Bar::class, 'property'));

        return 0;
    }
}
