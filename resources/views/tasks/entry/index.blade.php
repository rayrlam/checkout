<x-home>
    <x-slot name="title">
        Entry
    </x-slot>
    <div class="block">
        <h3 class="text-xl font-bold dark:text-white">
            {{ __('Entry') }} 
        </h3>
                
        <p class="mb-3 text-gray-500 text-base dark:text-gray-400">
            The Human Resource department of a large corporation has asked for the installation of a door entry system
            on each of the company's buildings. The door entry system aims to protect unauthorized access to a
            department building and greet the employee whenever he/she gains access. The company has 5 buildings in
            three different countries as described below. Each employee will receive only one RFID card. He/she must tap
            the RFID card on the reader next to the door in order to gain access to the building.
        </p>
        
        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            You are asked to: design and implement the database (using MySQL or similar) managing buildings, departments and
            employees
            <br>
            <b>
                write an API using PHP that given the RFID card number will return a JSON record
            </b>
        </p>

        <h3 class="mt-4 text-xl font-bold dark:text-white">
            {{ __('The database') }} 
        </h3>
  
        <ul class="space-y-2 text-gray-500  list-disc list-inside dark:text-gray-400">   
            <li class="md:text-sm text-xs">
                The RFID card number is unique and 32 chars long string
            </li>
            <li class="md:text-sm text-xs">
                An employee can work in one or more departments
            </li>
            <li class="md:text-sm text-xs">
                 UK buildings:
                <ul class="lg:list-disc">
                    <li class="lg:ml-8">
                        The <b>Isaac Newton</b> building: development and accounting departments
                    </li>
                    <li class="lg:ml-8">
                        The <b>Oscar Wilde</b> building: HR and sales departments
                    </li>
                    <li class="lg:ml-8">
                        The <b>Charles Darwin</b> building: the company headquarters
                    </li>
                </ul>
            </li>
            <li class="md:text-sm text-xs">
                USA buildings:
                <ul class="lg:list-disc">
                    <li class="lg:ml-8">
                        The <b>Benjamin Franklin</b> building: development and sales departments
                    </li>
                </ul>
            </li>
            <li class="md:text-sm text-xs">
                ITALY buildings:
                <ul class="lg:list-disc">
                    <li class="lg:ml-8">
                        The <b>Luciano Pavarotti</b> building: development and sales departments
                    </li>
                </ul>
            </li>
            <li class="md:text-sm text-xs">
                For an employee we need to store at least the Full name
            </li>
        </ul>
        
        <h3 class="text-xl font-bold dark:text-white">
            {{ __('The API') }} 
        </h3>

        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs">
           The specification you have been handed for a microservice associated with this security system is as follows:  
        </p>

        <div class="code-block mt-3">
            <pre class="code-block-content">
curl -s ‘https://api.domain.com/some/endpoint?cn=not_found | jq
{
    "full_name": "",
    "department": []
}
            </pre>
        </div>
        <div class="code-block mt-3">
            <pre class="code-block-content">
curl -s ‘https://api.domain.com/some/endpoint?cn=142594708f3a5a3ac2980914a0fc954f | jq
{
    "full_name": "Julius Caesar",
    "department": ["director", "development"]
}
            </pre>
        </div>

        <h3 class="mt-4 text-xl font-bold dark:text-white">
            {{ __('Test data') }} 
        </h3>

        <div class="mt-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                <table id="items" class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                RFID card number
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Employee
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Departments
                            </th>
                        </tr>
                    </thead>
                    <tbody>
              
                        <tr class="bg-white dark:bg-gray-900  border-b dark:border-gray-700">
                            <th scope="row" class="text-center px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-xs">
                                142594708f3a5a3ac2980914a0fc954f
                            </td>
                            <td class="text-center px-6 py-2 text-xs">
                                Julius Caesar
                            </td>
                            <td class="text-center px-6 py-2 text-xs">
                                director, development
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h3 class="mt-4 text-xl font-bold dark:text-white">
            {{ __('Your solution') }} 
        </h3>

        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            You are required to develop and test this endpoint. When returning your solution please include:
        </p>

        <ul class="space-y-2 text-gray-500  list-disc list-inside dark:text-gray-400">   
            <li class="md:text-sm text-xs">
                Your database schema
            </li>
            <li class="md:text-sm text-xs">
                Your source code
            </li>
            <li class="md:text-sm text-xs">
                Details of any apache or other config required
            </li>
            <li class="md:text-sm text-xs">
                List of your test cases and data
            </li>
             <li class="md:text-sm text-xs">
                Any comments you would feed back about the service
            </li>
        </ul>

        @include('components.setup')
    
        <h4 class="text-base font-bold dark:text-white mt-3">
            {{ __('Main Files') }} 
        </h4>

        <ul class="space-y-4 text-gray-500  list-inside dark:text-gray-400">  
       
            <li class="text-indigo-700 text-xs">
                App\Http\Controllers\Entry\Api\V1
                <div class="ps-5">
                    - Controller: EntryV1Controller<br>
                    - Repository: EntryRepository
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Tests\Unit
                <div class="ps-5">
                    - EntryTest<br>
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Sql File
                <div class="ps-5">
                    - <a href="/database_22-05-22.sql">database_22-05-22.sql</a>
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Api Route
                <div class="ps-5">
                    - api/v1/checking
                </div>
            </li>
        </ul>
    </div>    
</x-home>