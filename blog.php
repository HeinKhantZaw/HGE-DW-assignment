<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$GLOBALS['title'] = "HGE - Blog";
include 'components/header.php';
include 'blogClass.php';
$id = $_GET['id'];


switch ($id) {
    case 1:
        $blog = new blogClass("blog-1.jpg", "Is the ‘Treadmill Strut’ Workout Trend Worth the Hype?", "10 August 2022", "Richard");
        $blog->setArticle("Does strutting along to Taylor Swift, Lizzo, and Arianna Grande count as a workout?

Allie Bennett, the self-proclaimed “CEO of the treadmill strut,” skyrocketed to viral TikTok fame in April 2022 when she decided to create a 36-minute treadmill workout set to a playlist of Taylor Swift songs: the original treadmill strut workout. 

In that first video, which has garnered 3.7 million views so far, she posted instructions for the workout: Starting with the first song on the playlist, find your pace. When the song changes, increase the pace of the treadmill by 0.1 miles per hour. When you get to the final two songs, either stay at the pace you land at, or crank it up to jogging speed. Then lower the pace for the last song to whichever speed allows you to cool down (and strut it out).

“It’s not just a playlist. It’s a full 36-minute treadmill workout,” she said about the Taylor Swift Treadmill Strut in an accompanying video. 

The Taylor Swift treadmill strut is her most popular video, but others, also inspired by her favorite singers, have gone viral as well. Her Lizzo workout has amassed 1.6 million views, the Dua Lipa workout has 1.9 million views, and the Ariana Grande and Doja Cat workouts have 3.6 and 3.7 million views respectively. All playlists are available on Bennett’s Spotify page. 

The hashtag #treadmillstrut has over 81.8 million views, with users sharing their own treadmill strut challenge videos and playlists. And even singer Lizzo has tried out the workout she inspired and posted a TikTok video about how it went. “I did it. I feel great,” she noted in the video.

What Is the ‘Treadmill Strut’ Workout?

As Bennett explains in her videos, for the treadmill strut workout, you start at a comfortable pace and up your pace by 0.1 miles per hour for each new song on your playlist (which should be about 30 minutes total). Bennett’s playlists are all curated so that the pace of the songs increases to match the increasing pace of the workout. 

For the last two songs, Bennett suggests running or choosing a challenging pace. And for the last song, Bennett suggests picking a pace that feels like a good cooldown for you. Ramona Braganza, a Los Angeles–based celebrity personal trainer certified by the Canadian fitness education organization Canfitpro, says the walking workout is a great one for beginner exercisers looking for some extra motivation to keep with a workout.

It can also be modified for more experienced athletes by starting at a higher speed and pushing the pace up accordingly. Or, it might be a great low-intensity workout for advanced athletes to sandwich between more challenging workouts. 

The approach is a simple one that includes elements of a healthy workout, she says: “It follows the principles of warming up, walking to a slower-paced song, and then increasing the pace gradually (in this case with each subsequent song).” 

By the end of Bennet’s workout, you’re walking vigorously or jogging at a slow pace. And if you picked a playlist with beats you enjoy, you may not even notice (or mind) the extra effort you’re exerting, she says.

Walking is a form of cardiovascular or aerobic exercise, Braganza adds. If you’re doing it at a pace that gets your heart rate up (think about working at around 70 percent of your maximum) it can definitely count toward the 150 minutes of weekly moderate-intensity aerobic exercise recommended by the U.S. Department of Health and Human Services Physical Activity Guidelines for Americans.

Braganza says if a workout gets you moving and you enjoy it, then it’s going to be good for your overall fitness.

She notes that there's nothing “revolutionary” about the approach. Many trainers use a gradually-pick-up-the-pace style of workout, she says.");
        break;
    case 2:
        $blog = new blogClass("blog-2.jpg", "VR Fitness Games That Will Get You Hooked and Make You Sweat", "16 September 2022", "Bob");
        $blog->setArticle("Slicing orbs to the beat of your favorite song, jumping over and ducking under laser beams, or sword fighting orcs in the middle of a forest — if these workouts sound like a lot more fun than clocking miles on the treadmill, read on.

With virtual reality (VR) technology, you can break a sweat and burn some serious calories from the comfort of your living room, says Jimmy Bagley, PhD, an associate professor of kinesiology and research director of the Strength and Conditioning Lab at San Francisco State University, where he studies virtual reality health and exercise. Plus, the games can be a whole lot of fun.

“Virtual reality games aren’t always marketed as exercise, but our research shows that when you play them, some can deliver the workout equivalent of walking on a treadmill or cycling on a stationary bike,” Dr. Bagley says.

To start with VR fitness, you’ll need a VR headset, like a Meta Quest 2 (formerly Oculus Quest 2), an HTC Vive Pro, or a PlayStation VR. Then you’ll need to download a few games.

And remember, if you have a health condition or injury that might interfere with your ability to safely exercise, check with your doctor before trying out VR fitness games or any new workout program. We asked Bagley and other experts in the VR fitness field for their favorite games to play when they’re ready for a workout. These games will get you off the couch and on your feet, and they’ll even get your heart rate pumping. Here’s a roundup of their top picks:

1. Supernatural
Supernatural was the top pick from Bagley and Aaron Stanton, founder and director of the VR Health Institute, an independent research organization launched in 2017 to study the effects of virtual and augmented reality technology on fitness. (Bagley and San Francisco State University have partnered with the VR Health Institute for research projects.)");
        break;
    case 3:
        $blog = new blogClass("blog-3.jpg", "Should You Get a Personal Trainer?", "20 September 2022", "David");
        $blog->setArticle("Personal training isn’t just for people who are looking to get perfectly toned bodies. A lot of people (no matter what shape they're in) can benefit from working with a personal trainer to set exercise goals and accomplish them (in good health and injury-free).

Personal trainers are fitness professionals who work with individuals to teach exercise form and technique, keep clients accountable to their exercise goals, and create customized workout plans based on the individual’s specific health and fitness needs. Many exercise institutions, such as the American Council on Exercise (ACE), the American College of Sports Medicine (ACSM), the National Academy of Sports Medicine (NASM), and the National Strength and Conditioning Association (NSCA) certify personal trainers. Once certified, many of these groups require the completion of continuing education credits, holding special insurance, and taking regular CPR-AED classes in order for trainers to maintain their certification and licenses. The National Commission for Certifying Agencies (NCCA), the gold standard of accrediting bodies, currently backs more than a dozen fitness professional certifications, including those from these institutions.

Personal-training certifications include “certified personal trainer” (CPT), which readies someone for general exercise instruction; “certified strength and conditioning specialist” (CSCS), which focuses on resistance training for everyday and professional athletes; “corrective exercise specialist” (CES), which focuses on exercises to help improve movement dysfunctions and imbalances; and “certified exercise physiologist” (CEP), which focuses on training someone on how to analyze people’s fitness to help them improve their health or maintain good health. If you decide to work with a personal trainer, she says, “You want to make sure that your trainer has some level of education in exercise.”");
        break;
}
?>

	<!--====== Main App ======-->
	<div id="app">
	<!--====== Main Header ======-->
    <?php include 'components/navbar.php'; ?>
	<!--====== End - Main Header ======-->
	<div class="app-content">
		<!--====== Section 1 ======-->
		<div class="u-s-p-y-90">

			<!--====== Detail Post ======-->
			<div class="detail-post">
				<div class="bp-detail">
					<div class="bp-detail__thumbnail">

						<!--====== Image Code ======-->
						<div class="aspect aspect--bg-grey aspect--1366-768">

							<img class="aspect__img" src="images/blog/<?php echo $blog->getImg() ?>" alt=""></div>
						<!--====== End - Image Code ======-->
					</div>
					<div class="bp-detail__info-wrap">
						<div class="bp-detail__stat">
                                <span class="bp-detail__stat-wrap">
                                    <span class="bp-detail__publish-date">
                                        <a><span><?php echo $blog->getDate() ?></span></a></span></span>
							<span class="bp-detail__stat-wrap">

                                    <span class="bp-detail__author">

                                        <a><?php echo $blog->getAuthor() ?></a></span></span>

						</div>

						<span class="bp-detail__h1">

                                <a><?php echo $blog->getTitle(); ?></a></span>
						<p class="bp-detail__p"><?php echo $blog->getArticle(); ?></p>

						<div class="gl-l-r bp-detail__postnp">
							<div>
                                <?php if ($id != 1) { ?>
									<a href="blog.php?id=<?php echo $id - 1; ?>">Previous Post</a>
                                <?php } ?>
							</div>
							<div>
                                <?php if ($id != 3) { ?>
									<a href="blog.php?id=<?php echo $id + 1; ?>">Next Post</a>
                                <?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--====== End - Detail Post ======-->
		<div class="u-s-p-y-90">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="disqus_thread"></div>
						<script>
                            (function () { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://hge-1.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
						</script>
						<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
								powered by
								Disqus.</a></noscript>

					</div>

				</div>
			</div>
		</div>
		<!--====== End - Section 1 ======-->
	</div>
	<!--====== End - App Content ======-->


    <?php include 'components/footer.php'; ?>
	<!--====== Modal Section ======-->
<?php include 'components/scripts.php'; ?>