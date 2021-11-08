<?php

namespace App\Command;

use App\Messenger\InnerClass;
use App\Messenger\Message;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

class SendMessageCommand extends Command
{
    protected static $defaultName = 'app:send-message';
    protected static $defaultDescription = 'Отправим сообщение и посмотрим что будет';

    public function __construct(
        private MessageBusInterface $messageBus
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription(self::$defaultDescription);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $message = new Message('some text 111');

        $innerObject = new InnerClass('text 22');
        $message->addObject($innerObject);

        $innerObject = new InnerClass('text 33');
        $message->addObject($innerObject);

        $this->messageBus->dispatch($message);

        $io->success('Отправилось');

        return Command::SUCCESS;
    }
}
