<?php

namespace KanAfghan\KyyDownloader\Console\Command;

use GuzzleHttp\Client;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * @package kyy-downloader
 */
class DownloadCommand extends \Symfony\Component\Console\Command\Command
{
    const DOWNLOAD_ENDPOINT = 'http://videos.mtv.in.com/Shows/kaisi_hai_yaariyan/episodes/%d/KYY_%d_muxed.mp4';
    const FILENAME          = 'downloads/KYY_%d_muxed.mp4';

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this
            ->setName('download')
            ->setDescription('Download the Kaise Yeh Yaarian serial.')
            ->addArgument(
                        'from',
                        InputArgument::REQUIRED,
                        'A positive integer indicating the episode number'
            )
            ->addArgument(
                        'to',
                        InputArgument::REQUIRED,
                        'A positive integer indicating the episode number'
            )
        ;
       
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $from = (integer) $input->getArgument('from');
        $to = (integer) $input->getArgument('to');

        if ( ($from >= $to) || ($from < 0) ) {
           throw new \InvalidArgumentException('to number should be greater than from number');
        }

        $output->writeln(sprintf('Downloading from %d to %d', $from, $to));
        
      
    }
    protected function downloadEpisode($episode, OutputInterface $output)
    {
        
        // $episodeNumber = 127;
        // $episode = sprintf(self::DOWNLOAD_ENDPOINT, $episodeNumber, $episodeNumber);
        // $filename = sprintf(self::FILENAME, $episodeNumber);

        // if (file_exists($filename)) {
        //     $output->writeln(sprintf('The episode %d is already downloaded in %s', $episodeNumber, $filename));

        //     return;
        // }

        // $output->writeln('Downloading: ' . $episode);
        // $output->writeln('Saving to: ' . $filename);

        // if (!$handle = fopen($filename, 'c')) {
        //     $output->writeln(sprintf('<error>Could not open `%s`</error>', $filename));

        //     return;
        // }

        // $client = new Client([
        //     'timeout'  => 15.0,
        //     'verify'   => false,
        // ]);

        // $response = $client->get($episode, ['stream' => true]);
        // $body = $response->getBody();

        // $bytesDownloaded = 0;
        // while (!$body->eof()) {
        //     if (false === fwrite($handle, $body->read(1024))) {
        //         $output->writeln(sprintf('<error>Could not write to `%s`</error>', $filename));

        //         return;
        /*    }

            $bytesDownloaded += 1024;
            
            $mb = round($bytesDownloaded / (1000 * 1000));
            if ($mb > 0) {
                $output->writeln(sprintf('Downloaded %d MB', $mb));            
            }
        }*/
    } 
}
