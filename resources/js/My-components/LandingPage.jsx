import { Link } from "@inertiajs/react";
import React from "react";

export const CardJenisSampah = ({ src, nama, href }) => {
    return (
        <Link href={href} className="hov-b rounded-md bg-gray-50 m-3">
            <article
                title={nama}
                className="flex flex-col w-[160px] h-[115px] space-y-4 p-4 border justify-center items-center border-gray-300 solid rounded-md"
            >
                <img className="h-9 w-9" src={src} alt={nama} />
                <h1 className="text-xl font-bold font-redHatDisplay">{nama}</h1>
            </article>
        </Link>
    );
};
export const CardLayanan = ({ href, img, nama, desk }) => {
    return (
        <Link href={href}>
            <article
                title={nama}
                className="hov-b bg-gray-50 flex-2 w-80 h-44 space-y-4 p-4 border border-gray-300 solid rounded-md"
            >
                <div className="flex space-x-3">
                    <img src={img} alt={nama} />
                    <h1 className="text-xl font-bold font-redHatDisplay">
                        {nama}
                    </h1>
                </div>
                <p className="text-slate-600">{desk}</p>
            </article>
        </Link>
    );
};
