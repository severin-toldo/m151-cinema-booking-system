<?php


namespace App\Controller\pages\add_edit;


use App\Entity\MovieEntity;
use App\Model\Permission;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Constraints\File;

class AddMoviePageController extends AbstractAddPageController {

    private SluggerInterface $slugger;


    public function __construct(SluggerInterface $slugger) {
        $this->slugger = $slugger;
    }

    protected function getAddPageTitle(): string {
        return 'Add Movie';
    }

    protected function getAddPermissions(): array {
        return [Permission::ADD_MOVIES];
    }

    protected function getFormActionRoute(): string {
        return 'add_movie';
    }

    protected function handleForm(): void {
        $movieEntity = $this->form->getData();
        $movieImage = $this->form->get('image')->getData();

        if ($movieImage) {
            $originalFilename = pathinfo($movieImage->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $this->slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$movieImage->guessExtension();
            $movieImage->move( 'images', $newFilename);
            $movieEntity->setImageFileName($newFilename);
        }

        $this->getDoctrine()->getManager()->persist($movieEntity);
        $this->getDoctrine()->getManager()->flush();
    }

    protected function getForm(): FormInterface {
        $movie = new MovieEntity();
        $movie->setName('');
        $movie->setLength(0);
        $movie->setFskApproval(0);
        $movie->setDescription('');

        return $this->getDefaultFormBuilder($movie)
            ->add(
                'name',
                TextType::class,
                [
                    'label' => 'Name*',
                    'empty_data' => '',
                ]
            )
            ->add(
                'description',
                TextType::class,
                [
                    'label' => 'Description*',
                    'empty_data' => '',
                ]
            )
            ->add(
                'fskApproval',
                IntegerType::class,
                [
                    'label' => 'FSK Approval*',
                    'empty_data' => '',
                ]
            )
            ->add(
                'length',
                IntegerType::class,
                [
                    'label' => 'Length*',
                    'empty_data' => '',
                ]
            )
            ->add('image', FileType::class, [
                'label' => 'Image',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid Image file',
                    ])
                ],
            ])
            ->getForm();
    }
}