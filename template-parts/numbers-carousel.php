<style>
.numbers__main a.item {
	position: relative !important;
    border-right: 1px solid #384541;
    overflow: hidden;
    height: 152px;
    display: flex;
    align-items: center !important;
    justify-content: center !important;
}

.numbers__main:last-child a.item {
	border-right: unset !important;
}

.item-content {
	width: 100%;
	margin: 0 3px;
    padding: 37px 0;
}

.numbers__main .item-content {
    transition: transform 0.3s ease-in-out;
}

.numbers__main a.item:hover .item-content {
    transform: scale(1.03); /* Scaling effect on hover */
	background: #F7F6F2;
}

.numbers-carousel .numbers-contain .grid-3 {
	padding: 8px;
}

.number,
.caps {
    transition: transform 0.3s ease-in-out;
    position: relative;
    z-index: 1;
}

.numbers__main a.item:hover .number,
.numbers__main a.item:hover .caps {
    transform: none; /* Prevents these elements from zooming */
}

.numbers-contain .item {
    width: 100% !important;
}

@media (min-width: 1025px) {
    .numbers__main:nth-child(5) a.item {
        border-right: unset !important;
    }

    .numbers__main {
        width: 20%;
        padding-left: 0;
        padding-right: 0;
    }
}

@media (max-width: 900px) {
	section.numbers-carousel.wide {
		overflow: hidden;
	}
}
</style>

<?php if (have_rows('numbers_carousel')): ?>
<?php while (have_rows('numbers_carousel')): the_row(); ?>
<section class="numbers-carousel wide">
	<div class="container-90">
		<div class="row justify-content-center reveal-up-all">
			<div class="grid-12 copy text-center">
				<?php if (is_front_page()): ?>
					<?php if (get_locale() == 'en_US'): ?>
						<h2 class="thin">We’ve Won Over <span class="text-highlight">$500 Million Dollars</span> in Personal Injury Claims</h2>
						<p>Adamson Ahdoot understands the struggles personal injury victims can have. That’s why we’ve dedicated ourselves to advocating for our clients, helping them pursue the fair compensation they deserve.</p>
						<p>We’ve recovered over $500 million through personal injury settlements for our clients. When you choose Adamson Ahdoot, you’re choosing a team of Los Angeles personal injury attorneys who will stop at nothing to secure justice for those who have suffered serious injuries and have been wronged.</p>
					<?php else: ?>
						<h2 class="thin">Hemos Ganado Más de <span class="text-highlight">$500 Millones de Dólares</span> en Cantidad Total de Recuperación</h2>
					<?php endif; ?>
				<?php else: ?>
					<h2 class="c_mb-50"><?php the_sub_field('headline'); ?></h2>
				<?php endif; ?>
			</div>
		</div>
		<div class="row justify-content-center reveal-up-all">
			<div class="numbers-contain owl-carousel">
				<?php if (have_rows('number_group')): ?>
				<?php while (have_rows('number_group')): the_row(); ?>
					<?php if (get_sub_field('page_link')): ?>
						<div class="numbers__main">
							<a href="<?php the_sub_field('page_link'); ?>" class="grid-3 item" aria-label="<?php echo esc_attr(get_sub_field('headline')); ?>">
					<?php else: ?>
						<div class="grid-3 item">
					<?php endif; ?>
					<div class="item-content">
						<div class="number text-center">$<span><?php the_sub_field('number'); ?></span></div>
						<div class="caps green text-center"><?php the_sub_field('headline'); ?></div>
					</div>
					<?php if (get_sub_field('page_link')): ?>
							</a>
						</div>
					<?php else: ?>
						</div>
					<?php endif; ?>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</section>
<?php endwhile; endif; ?>
