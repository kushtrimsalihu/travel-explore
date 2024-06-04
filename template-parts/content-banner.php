<?php 
$title = get_sub_field('title');
$description = get_sub_field('description');
$button = get_sub_field('button');
$img = get_sub_field('image');
?>

<div class="banner bg-[#FFF8F5] flex flex-col items-center py-12 relative top-[88px] gap-[40px]">
    <div class="text-center w-[614px] h-[245px] max-w-[800px] l-[] z-10">
        <h1 class="font-roboto text-[45px] font-normal leading-[52px] text-red-400">
            <?php echo $title; ?>
        </h1>
        <p class="mt-6 text-lg text-gray-600 font-roboto text-[16px] leading-[24px] tracking-[0.5px]">
            <?php echo $description; ?>
        </p>
        <?php if ($button): ?>
            <a href="<?php echo $button['url']; ?>" class="mt-6 mb-12 inline-block bg-transparent text-[#88511D] py-[10px] px-[24px] rounded-[40px] border border-[#88511D] text-center">
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

<div>
<?php if ($img): ?>
        <div class="mt-20 w-full px-4 lg:px-0 relative"> 
            <div class="relative flex justify-center items-center">
                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="w-full max-w-[1328px] h-auto rounded-tl-[32px] rounded-tr-[32px] z-10 top-[496px]" />
                <div class="absolute top-0 left-0 h-1/2 w-full bg-[#FFF8F5] "></div>
            </div>
        </div>
    <?php else: ?>
        <p>No image found.</p>
    <?php endif; ?>
</div>
