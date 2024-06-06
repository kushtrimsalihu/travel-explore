<?php 
$title = get_sub_field('title');
$description = get_sub_field('description');
$button = get_sub_field('button');
$img = get_sub_field('image');
?>

<div class="bg-light-n98 flex justify-center items-center min-h-screen p-8 md:p-20 md:gap-2.5 py-10 px-8">
    <div class="flex flex-col md:flex-row items-center md:items-start p-0">
    <div class="md:w-1/2 mb-16 md:mb-0 md:pr-16 p-10 md:py-[166px] md:pb-0 md:pl-0">

        <h1 class="text-light-p10 font-roboto text-[32px] md:text-[45px] font-normal leading-[52px] text-left md:mb"><?php echo $title; ?></h1>
        <p class="text-light-p10 md:pb-6 pb-4 font-roboto text-[16px] leading-relaxed text-left"><?php echo $description; ?></p>
            <div class="flex justify-start md:mt-10 mt-8">
                <?php if ($button): ?>
                    <a href="<?php echo $button['url']; ?>" class=" mb-10 inline-block bg-transparent text-light-p40 py-2.5 px-6 rounded-full border border-[#88511D] text-center hover:bg-light-p40 hover:text-white-100">
                        Learn More
                        <svg class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                <?php else: ?>
                    <p>No button found.</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="md:w-1/2 flex justify-center items-center">
            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="h-[376px] md:h-[587px] rounded-[20px] md:rounded-[32px]">
        </div>
    </div>
</div>