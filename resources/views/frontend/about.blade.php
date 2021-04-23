@extends('frontend.layout')
@section('body')
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
                <div class="logo mt-5">
                    <a class="text-white" {{config('app.url')}}"><img src="{{ asset('img/logo.png') }}" alt="greencontributor" class="img-fluid">GreenContributor</a>
                </div>
            </div>
            <div class="col-9 md-12">
                <h2><b> Welcome To GREENCONTRIBUTOR!</b></h2><br>
                <p>
                    GreenContributor Inc. a Canadian-based organization has been involved in environmental and educational initiatives and also offers Global opportunities of entrepreneurship and research based programs for students, from all over the world for Universities and Business schools.
                    <br><br>
                    GreenContributor designed programs  that offers challenges to the students to address issues that impact  communities and motivate them to be the change ambassadors. GreenContributor offers opportunities for students to participate in environmental research based projects, educational theme based tours and activities where the students are challenged to take action in addressing real problems, find solutions that can be implemented locally and globally, besides connecting communities and organizations through partnerships with educational institutions,
                    <br><br>
                    Since 2010, GreenContributor has worked with over 150 schools from 29 countries and one of the highlights was partnering with University of Erlangen Nurnberg for a Climate Change Research Project as part of an initiative for the German educational system for Schools.
                    <br><br>
                    Later on , GreenContributor  expanded their programs to include students from universities including  GIP credit programs for undergrad students and also providing platforms to implement & convert their ideas into reality.  .
                    <br><br>
                    GreenContributor offers diverse programs in different fields in many countries and besides being environmental and educational,  students also have opportunities for internship and entrepreneurship programs.</p>
                <h2>What & Why?</h2>
                <p><strong>What is GreenContributor?</strong> <br>
                    GreenContributor seeks to create a platform that provides an opportunity for students and the general community to participate in environmental initiatives, besides providing environment education, learn about green initiatives, volunteer in environmental community projects and a rewards and recognition program.
                    <br><br>
                    Our platforms in different countries, will provide a mutually beneficial means to communicate, share and exchange information related to environment related topics, green practices and initiatives, case studies, success stories, businesses opportunity for students through interaction with startups and individuals to showcase their skills and talents and generate ideas.
                    <br><br>
                <h5>Why this initiative and how to promote pro environment behaviour and develop green character?</h5><br>
                In general it is seen that people participate in green activities either because it is a fashion statement (status symbol), or due to peer pressure (compare against benchmark), or for an egoistic consideration (people like to be acknowledged for doing something), or because of altruistic & biospheric consideration (considering the good of others and the environment global sum of all worlds ecosystem).So it is related to how people behave.
                <br><br>
                <h5>How to influence people’s behaviour?</h5><br>
                Various researches have shown that people tend to behave based on social norms. While emphasizing positive behaviours and relationships with the focus on the morality helps in building character, various researches have indicated that addition of performance part pushes the students/people to do their best.
                <br><br>
                They act when they are bench marked against neighbours, neighbouring communities. They also act when their actions are followed by some sort of acknowledgement or making things visible.
                <br><br>
                This is the reason to have a rewards and recognition system for providing the motivation and the opportunity to participate and creating an environment to benchmark communities with other communities, schools with schools and businesses with businesses.
                <br><br>
                <h5>What is the intended outcome?</h5><br>
                To create a community “empowered with green character through green behaviour”.</p>
            </div>
        </div>
    </div>
</section>
@include('frontend.components.footer')
@endsection

