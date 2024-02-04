import { CardJenisSampah, CardLayanan } from '@/My-components/LandingPage';
import { Navigation } from '@/My-components/Navigation';
import { HrefButton } from '@/My-components/Buttons';
import { Link, Head } from '@inertiajs/react';
import { Footer } from '@/My-components/Footer';

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    return (
        <main className='scroll-smooth'>
            {/* Meta Data */}
            <Head title="Welcome"  />
            
            {/* Content */}

            <Navigation />
            <header className='h-[445px] bg-[url(https://i.imgur.com/98HqLpe.jpg)] w-full bg-top bg-cover'>
            <div className="blur-background h-[445px] backdrop-blur-sm w-full bg-slate-900 bg-opacity-25">
                <div className='pt-5 pb-5 pr-10 pl-10 flex w-full'></div>
                <article className=' m-10 me-32 ml-32 flex flex-col justify-center items-center space-y-4'>
                    <h1 className='font-breeSerif text-gray-50 text-2xl'>EcoTreasures</h1>
                    <p className='text-wrap text-lg text-gray-50 text-center'>Tempat di mana sampah Anda dapat menjadi nilai baru. 
                    <br />Temukan kreativitas dalam sampah Anda dan berkontribusi untuk lingkungan yang lebih hijau!</p>
                    <HrefButton title="Masuk ke Marketplace" href="/" nama="Marketplace" classIcon="ml-2 fa-solid fa-arrow-right" />
                </article>
            </div>
            </header>
            {/* Layanan */}
            <section className='p-10 flex justify-center items-center flex-col space-y-6'>
                <div className='flex flex-col items-center justify-center space-y-3'>
                    <h1 className='text-3xl font-bold'>Layanan</h1>
                    <p>Revolusi daur ulang dari EcoTreasures untuk semua orang.</p>
                </div>
                {/* card layanan */}
                <div id='layanan' className='flex space-x-4 cursor-pointer'>
                    <CardLayanan href="/" img="https://svgshare.com/i/12gg.svg" nama="Pick Up" desk="Foto sampah daur ulangmu, upload ke website Ecotreasures, petugas terdekat akan menjemput, menimbang dan membayar sampahmu." />
                    <CardLayanan href="/" img="https://svgshare.com/i/12f8.svg" nama="Drop off" desk="Antar langsung sampahmu ke Recycling Centre terdekat, kamu bisa mendaur ulang dengan ukuran kecil seperti satu botol plastik." />
                </div>
            </section>
            {/* Jenis Sampah */}
            <section className='p-10 flex justify-center items-center flex-col space-y-6'>
                <div className='flex flex-col items-center justify-center space-y-3'>
                    <h1 className='text-3xl font-bold'>Jenis Sampah</h1>
                    <p>Lihat semua jenis sampah yang kami daur ulang.</p>
                </div>
                {/* card layanan */}
                <div className='flex cursor-pointer max-w-[750px] flex-wrap justify-center items-center'>
                    <CardJenisSampah href="/" src="https://svgshare.com/i/12fJ.svg" nama="Kertas" />
                    <CardJenisSampah href="/" src="https://svgshare.com/i/12gh.svg" nama="Plastik" />
                    <CardJenisSampah href="/" src="https://svgshare.com/i/12fK.svg" nama="Aluminium" />
                    <CardJenisSampah href="/" src="https://svgshare.com/i/12h1.svg" nama="Besi & Logam" />
                    <CardJenisSampah href="/" src="https://svgshare.com/i/12ez.svg" nama="Elektronik" />
                    <CardJenisSampah href="/" src="https://svgshare.com/i/12gJ.svg" nama="Botol" />
                    <CardJenisSampah href="/" src="https://svgshare.com/i/12fc.svg" nama="Merek" />
                    <CardJenisSampah href="/" src="https://svgshare.com/i/12fo.svg" nama="Khusus" />
                </div>
            </section>
            <section>
                <Footer />
            </section>
        </main>
    );
}
