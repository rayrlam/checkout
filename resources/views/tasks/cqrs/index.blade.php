<x-home>
    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>
    <div class="block mt-3">
        <h3 class="text-xl font-bold dark:text-white">
            {{ __('Cqrs') }} 
        </h3>
                
        <p class="mb-3 text-gray-500 text-base dark:text-gray-400">
            We need to refactor our Laravel e-commerce application to incorporate the Command Query Responsibility Segregation (CQRS) pattern for product management. Our application follows a traditional MVC structure with a ProductController that handles all product-related operations. The existing code looks something like this:
        </p>

        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            <div class="code-block mt-3">
                <pre class="code-block-content pl-3 text-gray-500 dark:text-gray-400">

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::create($request->validated());
        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }
}
                </pre>
            </div>
        </p>

        <p class="mt-3 text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            This approach directly interacts with the Product model for both creating and retrieving products. While it has served us well, but we need a more scalable and flexible architecture as our application grows.        
        </p>

        <p class="mt-3 text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            Your task is to refactor this code to implement the CQRS pattern. This involves separating our product-related operations into distinct command (write) and query (read) paths.
        </p>

        <div class="mt-6">
            <h3 class="text-xl font-bold dark:text-white">
                Your primary objectives are:
            </h3>
            <ul class="space-y-2 text-gray-500  list-disc list-inside dark:text-gray-400">   
                <li class="md:text-sm text-xs">
                    Design and implement the command side of our CQRS architecture for product creation. This will replace the current store method in our ProductController.
                </li>
                <li class="md:text-sm text-xs">
                    Develop the query side of the architecture for retrieving product information, which will take over the functionality currently handled by the show method in our ProductController.
                </li>
                <li class="md:text-sm text-xs">
                    Create routes that serve the commands and queries to their respective handlers.
                </li>
                <li class="md:text-sm text-xs">
                    Update our product management functionality to use this new CQRS structure, ensuring that all existing features continue to work as expected.
                </li>
                <li class="md:text-sm text-xs">
                    Write unit tests for the new command and query handlers to ensure the reliability of the CQRS implementation.
                </li>
            </ul>
        </div>

        <div class="mt-3">
            <p class="mt-3 mb-2 font-medium text-gray-700 dark:text-white md:text-sm text-xs">  
                As you implement these changes, consider how this pattern could be extended to other parts of our e-commerce system in the future. The goal is to improve our architecture's scalability and maintainability without disrupting current functionality.                      
            </p>
        </div>
    
        @include('components.setup')
        
        <h4 class="text-base font-bold dark:text-white mt-3">
            {{ __('Main Files') }} 
        </h4>

        <ul class="space-y-4 text-gray-500  list-inside dark:text-gray-400">  
            <li class="text-indigo-700 text-xs">
                App\Http\Controllers\Cqrs
                <div class="ps-5">
                    - CqrsController
                </div>
                <div class="ps-5">
                    - ProductController
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\CQRS
                <div class="ps-5">
                    - CommandBus
                </div>
                <div class="ps-5">
                    - QueryBus
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\CQRS\Commands
                <div class="ps-5">
                    - CreateProductCommand
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\CQRS\Handlers
                <div class="ps-5">
                    - CreateProductHandler
                </div>
                <div class="ps-5">
                    - GetProductHandler
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\CQRS\Queries
                <div class="ps-5">
                    - GetProductQuery
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\database\seeders
                <div class="ps-5">
                    - DataSeeder
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Tests\Unit
                <div class="ps-5">
                    - CqrsProductControllerTest
                </div>
            </li>                      
        </ul>  
    </div>        
</x-home>    