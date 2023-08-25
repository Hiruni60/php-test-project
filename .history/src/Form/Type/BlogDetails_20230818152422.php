<?php    
    namespace App\Form\Type;

    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\DateType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;
    
    class BlogDetails extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options): void
        {
            $builder
            ->add('blogTitle', TextType::class)
            ->add('blogDesvription', TextType::class)
            ->add('authorName', DateType::class)
            ->add('save', SubmitType::class) 
            ;
        }
    }






?>