import { Link } from "@inertiajs/react";
import React from "react";

export const ButtonLinkGreen = ({ href, children, className, title }) => {
    return (
        <Link
            title={title}
            href={href}
            className={`text-gray-50 bg-green-700 hover:bg-green-800 font-medium flex gap-2 items-center justify-center rounded-md px-4 py-2 ${className}`}
        >
            {children}
        </Link>
    );
};

export const ButtonLinkBorderWhite = ({ href, children, className, title }) => {
    return (
        <Link
            title={title}
            href={href}
            className={`text-white bg-transparent hover:text-green-500 hover:border-green-500 border border-white bg-green-700 font-medium flex gap-2 items-center justify-center rounded-md px-4 py-2 ${className}`}
        >
            {children}
        </Link>
    );
};

export const ButtonLinkBorderBlack = ({ href, children, className, title }) => {
    return (
        <Link
            title={title}
            href={href}
            className={`text-slate-500 bg-transparent hover:bg-green-50 border border-slate-400 font-medium flex gap-2 items-center justify-center rounded-md px-4 py-2 ${className}`}
        >
            {children}
        </Link>
    );
};

export const CancelButton = ({ href, color }) => {
    function cancel() {
        history.back();
    }
    if (color == 1) {
        return (
            <Link
                href={href}
                onClick={cancel}
                className="text-gray-50 border border-gray-50 hover:bg-gray-600 hover:bg-opacity-5 font-medium rounded-md text-sm px-5 py-1.5"
            >
                Cancel
            </Link>
        );
    } else {
        return (
            <Link
                href={href}
                onClick={cancel}
                className="text-gray-800 border border-gray-800 hover:bg-gray-600 hover:bg-opacity-5 font-medium rounded-md text-sm px-5 py-1.5"
            >
                Cancel
            </Link>
        );
    }
};
