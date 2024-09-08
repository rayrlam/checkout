<x-home>
    <x-slot name="title">
        TestingPlayground
    </x-slot>
    <div class="block mt-3">
        <h3 class="text-xl font-bold dark:text-white">
            {{ __('Welcome to My ')}} <span class="text-green-600">{{  __('Technical Test') }}</span> {{  __(' Showcase') }} 
        </h3>
                
        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            Hello and welcome! My name is Ray Lam, and I am a full-stack PHP web developer with many years of experience in building dynamic and robust web applications. This site serves as a portfolio of various technical tests and coding challenges I've completed. Each project here represents a unique problem-solving journey, showcasing different aspects of my programming skills and approach to software development.
        </p>

        <h5 class="mt-3 text-lg font-bold dark:text-white">
            {{ __('About Me') }} 
        </h5>

        <p class="text-gray-500 dark:text-gray-400 text-xs">
            With a strong foundation in PHP and a passion for coding, I have honed my skills in both front-end and back-end development. My experience encompasses a wide range of technologies, including:
        </p>

        @php
            $temp = [
                'Backend Development' => 'Proficient in PHP frameworks such as Laravel and Yii, I excel in creating scalable server-side applications and APIs',
                'Frontend Development' => 'Skilled in HTML, CSS, and JavaScript, I enjoy crafting responsive and user-friendly interfaces that enhance user experience.',
                'Database Management' => 'Experienced in working with MySQL and other database systems, I ensure data integrity and efficient data retrieval.',
                'Version Control' => 'Familiar with Git and collaborative workflows, I understand the importance of maintaining clean code and effective collaboration within development teams.'
            ];
        @endphp


        <ul class="space-y-2 text-gray-500  list-disc list-inside dark:text-gray-400">   
            @foreach($temp as $key=>$val)
                <li class="text-sm"><b>{{ $key }}:</b> {{ $val }}</li>
            @endforeach    
        </ul>

        <h5 class="mt-3 text-lg font-bold dark:text-white">
            {{ __('What You\'ll Find Here:') }} 
        </h5>

        @php
            $temp = [
                'Diverse Challenges' => 'From algorithm puzzles to full-stack applications, this collection covers a wide range of technical domains.',
                'Real-World Scenarios' => 'Many of these tests simulate real-world problems, demonstrating practical problem-solving abilities.',
                'Code Quality' => 'Each project adheres to best practices in coding standards, readability, and efficiency.',
                'Problem-Solving Approach' => 'Through these tests, you can gain insight into my analytical thinking and how I tackle complex issues.'
            ]
        @endphp

        <ul class="space-y-2 text-gray-500  list-disc list-inside dark:text-gray-400">   
            @foreach($temp as $key=>$val)
                <li class="text-sm"><b>{{ $key }}:</b> {{ $val }}</li>
            @endforeach    
        </ul>

        <h5 class="mt-3 text-lg font-bold dark:text-white">
            {{ __('Navigation:') }} 
        </h5>

        <p class="text-gray-500 dark:text-gray-400 text-sm">
            In the navbar above, you'll find links to each individual test. Feel free to explore them at your leisure. Each link will take you to a dedicated page where you can:<br>
            - Read about the specific challenge or requirements<br>
            - View the solution and its implementation<br>
            - Access the source code (where applicable)<br>
            - See any additional notes or reflections on the process
        </p>

        <h5 class="mt-3 text-lg font-bold dark:text-white">
            {{ __(' Why This Matters:') }} 
        </h5>
        
        <p class="text-gray-500 dark:text-gray-400 mb-2 text-sm">
            This collection not only demonstrates my technical capabilities but also reflects my passion for continuous learning and improvement. Each test here represents an opportunity I took to push my boundaries, learn new concepts, or refine existing skills.
        </p>
        
        <p class="text-gray-500 dark:text-gray-400 mb-2 text-sm">
            I hope you find this showcase informative and insightful. Whether you're a fellow developer, a potential employer, or just curious about coding challenges, I trust you'll find something of interest here.
        </p>
        
        <p class="text-gray-500 dark:text-gray-400 text-sm">
            Feel free to reach out if you have any questions or would like to discuss any of the projects in more detail. Happy exploring!
        </p>
    </div>        
</x-home>