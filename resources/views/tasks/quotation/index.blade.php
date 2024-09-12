<x-home>
    <x-slot name="title">
        Quotation
    </x-slot>
    <div class="block">
        <h3 class="text-xl font-bold dark:text-white">
            {{ __('Quotation') }} 
        </h3>
                
        <p class="mb-3 text-gray-500 text-base dark:text-gray-400">
            If you are reasonably familiar with Laravel, this task should take approximately 3 hours (but don't worry if it takes more or less time than that).
        </p>
        
        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            Create a Laravel project for an API endpoint using DRY and SOLID object-oriented PHP. The endpoint should accept a JSON payload containing the following fields: age, postcode, regNo. For example, the body of the request might look like this:
        </p>

        <div class="code-block mt-3 mb-3">
            <pre class="code-block-content">
{
    "age": 20,
    "postcode": "PE3 8AF",
    "regNo": "PJ63 LXR"
}
            </pre>
        </div>
         
        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs mb-3">
            Your code should make a call to a third party API to look up the vehicle registration number and return an ABI code. Note this does not need to be a real API call - you can mock the response, but still show an example of how you could go about connecting to a third party API.
        </p>
        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs mb-3">
            Use the attached quotation.sql to create a MySQL database which contains rating factors for various ages, postcode areas, and vehicle ABI codes. When a request hits your API, it should start with a base premium of £500 (this can be hard-coded), then find the rating factors to apply for age, postcode area, and ABI code (assume a rating factor of 1 if the value is not in the database). Multiply the premium by each rating factor in turn to obtain a total premium and return an appropriate JSON response. 
        </p>
        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs mb-3">   
            Please write the code in such a way that the quoting engine could be used with a different set of rating factors - for example, to allow re-use of the quoting engine with a different insurance product that uses additional or different rating factors, without breaking the existing implementation (bear in mind the open/closed principle here).
        </p>    

        <h3 class="text-xl font-bold dark:text-white">
            {{ __('What we are looking for:') }} 
        </h3>
  
        <ul class="space-y-2 text-gray-500  list-disc list-inside dark:text-gray-400">   
            <li class="md:text-sm text-xs">
                SOLID principles observed
            </li>
            <li class="md:text-sm text-xs">
                Good separation of concerns (especially between controller and model layers)
            </li>
            <li class="md:text-sm text-xs">
                No security vulnerabilities
            </li>
            <li class="md:text-sm text-xs">
                Code should be executable (no mis-typed variable names, missing use statements, etc.)
            </li>
        </ul>

        @include('components.setup')
    
        <h4 class="text-base font-bold dark:text-white mt-3">
            {{ __('Main Files') }} 
        </h4>

        <ul class="space-y-4 text-gray-500  list-inside dark:text-gray-400">  
       
            <li class="text-indigo-700 text-xs">
                App\Http\Controllers\Quotation\Api\V1
                <div class="ps-5">
                    - Controller: QuoteV1Controller<br>
                    - Other Classes: Calculator, QuoteRepository
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\Http\Controllers\Quotation\Api\V1\RatingFactor
                <div class="ps-5">
                    - Interface: RatingFactorInterface<br>
                    - Rating Factor Classes: Abicode, Age, Postcode, Premium
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\Helper
                <div class="ps-5">
                    - QuoteHelper
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Tests\Unit
                <div class="ps-5">
                    - QuotationTest
                </div>
            </li>
        </ul>
    </div>    
</x-home>