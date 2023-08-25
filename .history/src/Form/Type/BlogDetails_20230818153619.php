<?php    
    namespace App\Form\Type;

    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\DateType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;
    use App\Entity\Task;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    
    class BlogDetails extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options): void
        {
            $builder
            ->add('blogTitle', TextType::class)
            ->add('blogDescription', TextType::class)
            ->add('authorName', TextType::class)
            ->add('save', SubmitType::class)
            ;
            
        }
    }






?>