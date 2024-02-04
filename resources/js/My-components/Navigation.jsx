import { Link } from "@inertiajs/react";
import {
    ButtonLinkBorderBlack,
    ButtonLinkBorderWhite,
    ButtonLinkGreen,
} from "@/My-components/Buttons";
import React, { useEffect, useState } from "react";
import { EcoTreasures } from "./Logo";
import { IoIosArrowDown } from "react-icons/io";

export const Navigation = ({ type }) => {
    const [scroll, setScroll] = useState(false);

    useEffect(() => {
        const handleScroll = () => {
            if (window.scrollY > 400) {
                setScroll(true);
            } else {
                setScroll(false);
            }
        };

        window.addEventListener("scroll", handleScroll);
        return () => {
            window.removeEventListener("scroll", handleScroll);
        };
    }, []);
    if (type == 1) {
        return (
            <nav
                id="nav-main"
                className={` px-8 fixed top-0 flex items-center w-full h-16 z-20 bg-white `}
            >
                <div className="flex-1">
                    <EcoTreasures type="1" />
                </div>
                <div className="flex-2">
                    <ul
                        className={`flex space-x-4 text-slate-800 items-center`}
                    >
                        <Link href={"/"}>
                            <li className="hov-b hover:text-green-600">
                                Marketplace
                            </li>
                        </Link>
                        <Link href={"#layanan"}>
                            <li className="hov-b hover:text-green-600 flex justify-center items-center gap-1">
                                Layanan <IoIosArrowDown />{" "}
                            </li>
                        </Link>
                        <li className="flex space-x-1">
                            <ButtonLinkBorderBlack href="/login">
                                Log In
                            </ButtonLinkBorderBlack>
                            <ButtonLinkGreen href="/register">
                                Sign Up
                            </ButtonLinkGreen>
                        </li>
                    </ul>
                </div>
            </nav>
        );
    } else {
        return (
            <nav
                id="nav-main"
                className={` px-8 fixed top-0 flex items-center w-full h-16 z-20  ${
                    scroll
                        ? "bg-white bg-opacity-50 backdrop-blur-sm border-b-[0.5px] transition-all border-gray-200"
                        : ""
                } `}
            >
                <div className="flex-1">
                    <EcoTreasures type={`${scroll ? 1 : ""}`} />
                </div>
                <div className="flex-2">
                    <ul
                        className={`flex space-x-4 ${
                            scroll ? "text-slate-800" : "text-gray-50"
                        } items-center`}
                    >
                        <Link href={"/"}>
                            <li className="hov-b">Marketplace</li>
                        </Link>
                        <Link href={"#layanan"}>
                            <li className="hov-b flex justify-center items-center gap-1">
                                Layanan <IoIosArrowDown />{" "}
                            </li>
                        </Link>
                        <li className="flex space-x-1">
                            {scroll ? (
                                <ButtonLinkBorderBlack href="/login">
                                    Log In
                                </ButtonLinkBorderBlack>
                            ) : (
                                <ButtonLinkBorderWhite href="/login">
                                    Log In
                                </ButtonLinkBorderWhite>
                            )}
                            <ButtonLinkGreen href="/register">
                                Sign Up
                            </ButtonLinkGreen>
                        </li>
                    </ul>
                </div>
            </nav>
        );
    }
};
