import { CardJenisSampah, CardLayanan } from "@/My-components/LandingPage";
import { Navigation } from "@/My-components/Navigation";
import { ButtonLinkGreen } from "@/My-components/Buttons";
import { Head } from "@inertiajs/react";
import { Footer } from "@/My-components/Footer";
import { FaArrowRightLong } from "react-icons/fa6";

export default function Welcome() {
    return (
        <>
            {/* Meta Data */}
            <Head title="Welcome" />

            {/* Content */}

            <Navigation />
            <header className="hero-img h-[455px] w-full bg-center bg-cover relative">
                <div className="blur-background h-full backdrop-blur-sm w-full bg-slate-900 bg-opacity-25">
                    <article className="h-full flex flex-col justify-center items-center pt-16">
                        <div className="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0.3)] to-transparent absolute top-0"></div>
                        <h1 className="font-breeSerif text-gray-50 text-3xl mb-4 z-20">
                            EcoTreasures
                        </h1>
                        <p className="text-wrap text-xl text-gray-50 text-center max-w-[754px] mb-6 z-20">
                            Tempat di mana sampah Anda dapat menjadi nilai baru.
                            <br />
                            Temukan kreativitas dalam sampah Anda dan
                            berkontribusi untuk lingkungan yang lebih hijau!
                        </p>
                        <ButtonLinkGreen
                            title="Masuk ke Marketplace"
                            href="/"
                            className="z-20"
                        >
                            Marketplace <FaArrowRightLong />
                        </ButtonLinkGreen>
                    </article>
                </div>
            </header>
            {/* Layanan */}
            <section className="p-10 flex justify-center items-center flex-col space-y-6">
                <div className="flex flex-col items-center justify-center space-y-3">
                    <h1 className="text-3xl font-bold font-redHatDisplay">
                        Layanan
                    </h1>
                    <p>
                        Revolusi daur ulang dari EcoTreasures untuk semua orang.
                    </p>
                </div>
                {/* card layanan */}
                <div id="layanan" className="flex space-x-4 cursor-pointer">
                    <CardLayanan
                        href="/"
                        img="https://svgshare.com/i/12gg.svg"
                        nama="Pick Up"
                        desk="Foto sampah daur ulangmu, upload ke website Ecotreasures, petugas terdekat akan menjemput, menimbang dan membayar sampahmu."
                    />
                    <CardLayanan
                        href="/"
                        img="https://svgshare.com/i/12f8.svg"
                        nama="Drop off"
                        desk="Antar langsung sampahmu ke Recycling Centre terdekat, kamu bisa mendaur ulang dengan ukuran kecil seperti satu botol plastik."
                    />
                </div>
            </section>
            {/* Jenis Sampah */}
            <section className="p-10 flex justify-center items-center flex-col space-y-6">
                <div className="flex flex-col items-center justify-center space-y-3">
                    <h1 className="text-3xl font-bold font-redHatDisplay">
                        Jenis Sampah
                    </h1>
                    <p>Lihat semua jenis sampah yang kami daur ulang.</p>
                </div>
                {/* card layanan */}
                <div className="flex cursor-pointer max-w-[750px] flex-wrap justify-center items-center">
                    <CardJenisSampah
                        href="/"
                        src="https://svgshare.com/i/12fJ.svg"
                        nama="Kertas"
                    />
                    <CardJenisSampah
                        href="/"
                        src="https://svgshare.com/i/12gh.svg"
                        nama="Plastik"
                    />
                    <CardJenisSampah
                        href="/"
                        src="https://svgshare.com/i/12fK.svg"
                        nama="Aluminium"
                    />
                    <CardJenisSampah
                        href="/"
                        src="https://svgshare.com/i/12h1.svg"
                        nama="Besi & Logam"
                    />
                    <CardJenisSampah
                        href="/"
                        src="https://svgshare.com/i/12ez.svg"
                        nama="Elektronik"
                    />
                    <CardJenisSampah
                        href="/"
                        src="https://svgshare.com/i/12gJ.svg"
                        nama="Botol"
                    />
                    <CardJenisSampah
                        href="/"
                        src="https://svgshare.com/i/12fc.svg"
                        nama="Merek"
                    />
                    <CardJenisSampah
                        href="/"
                        src="https://svgshare.com/i/12fo.svg"
                        nama="Khusus"
                    />
                </div>
            </section>
            <section className="mt-8">
                <Footer />
            </section>
        </>
    );
}
