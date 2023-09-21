import React from "react";
import { Link } from "@inertiajs/inertia-react";
import styles from "./Navigation.module.css";

const Navigation = () => {
    return (
        <nav className={styles.nav}>
            <h3 className={styles.nav__h3}>
                Laravel learnings
            </h3>
            <ul className={styles.nav__ul}>
                <li>
                    <Link href="/" className={styles.nav__ul__li__a}>
                        Home
                    </Link>
                </li>
                <li>
                    <Link href="/user" className={styles.nav__ul__li__a}>
                        Users
                    </Link>
                </li>
            </ul>
            <div className={styles.nav__div}>
                <a href="#" className={styles.nav__div__a}> 
                    User
                </a>
                <form action="">
                    <button className={styles.nav__div__button}>
                        Logout
                    </button>
                </form>
                <a href="#" className={styles.nav__div__a}>
                    Login
                </a>
            </div>
        </nav>
    );
};

export default Navigation;