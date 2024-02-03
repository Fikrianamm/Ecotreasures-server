import { Navigation } from '@/My-components/Navigation';
import { Link, Head } from '@inertiajs/react';

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    return (
        <>
            {/* Meta Data */}
            <Head title="Welcome"  />
            
            {/* Content */}

            <header className='h-[450px] bg-[url(https://i.imgur.com/98HqLpe.jpg)] w-full bg-top bg-cover'>
            <div className="blur-background h-[450px] backdrop-blur-sm w-full bg-slate-900 bg-opacity-25">
                <Navigation />
                <article className=' m-10 me-32 ml-32 flex flex-col justify-center items-center space-y-4'>
                    <h1 className='title-app text-2xl'>EcoTreasures</h1>
                    <p className='text-wrap text-lg text-gray-50 text-center'>Tempat di mana sampah Anda dapat menjadi nilai baru. 
                    <br />Temukan kreativitas dalam sampah Anda dan berkontribusi untuk lingkungan yang lebih hijau!</p>
                    <Link href={"/login"} class="focus:outline-none text-gray-50 bg-green-700 hover:bg-green-800 font-medium rounded-lg text-base px-5 py-2.5">Marketplace<i class="ml-2 fa-solid fa-arrow-right"></i></Link>
                </article>
            </div>
            </header>
        </>
    );
}
