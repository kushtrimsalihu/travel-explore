<?php 
$title = get_sub_field('title');
$description = get_sub_field('description');
$button = get_sub_field('button');
$img = get_sub_field('image');
?>

<div class="bg-light-n98 flex justify-center items-center lg:min-h-screen md:min-h-screen md:p- lg:p-20 lg:gap-2.5 py-10 px-8">
    <div class="flex flex-col lg:flex-row items-center lg:items-start p-0">
    <div class="flex-1 mb-10 lg:mb-0 lg:pr-16 lg:py-166 lg:pb-0 md:pb-0 md:pl-0 lg:pl-0">

        <h1 class="text-light-p10 font-roboto text-4xl lg:text-45 leading-40 lg:leading-52 font-normal text-left "><?php echo $title; ?></h1>
        <p class="text-light-p10 lg:pb-6 pb-4 font-roboto text-sm lg:text-base lg:tracking-0.5 text-left lg:mx-auto"><?php echo $description; ?></p>
        <div class="flex justify-start lg:mt-10 mt-8">
            <?php if ($button): ?> 
                <a href="<?php echo $button['url']; ?>" class="inline-block bg-transparent text-light-p40 py-2.5 px-6 rounded-full border border-light-p40 text-center hover:bg-light-p40 hover:text-white-100">
                            Learn More
                <svg class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
                </a>
            <?php endif; ?>
        </div>

        </div>
        <div class=" h-376 w-full lg:w-599 md:w-full md:h-full lg:h-587 flex justify-center items-stretch overflow-hidden">
            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="w-full h-full object-cover rounded-20 lg:rounded-32">
        </div>

    </div>
</div>