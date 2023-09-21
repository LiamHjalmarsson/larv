import React, { useState } from 'react';
import styles from "./index.module.css";
import A_button from '../../components/Ui/A_button';
import Layout from '../../components/Shared/layout';

const User = (props) => {
    return (
        <>
            <Layout className={styles.user}>
                {props.users.map(user => (
                    <div key={user.id} className={styles.user__div}>
                        <div className={styles.user__div__div}>
                            <h3 className={styles.user__div__div__h3}>
                                {user.username}
                            </h3>
                            <div className={styles.user__div__div__div}>
                                <img src={user.avatar} alt="" className={styles.user__div__div__div__img}/>
                            </div>
                        </div>
                        <div className={styles.user__div__div}>
                            <A_button href={`/user/${user.username}`}>
                                Go to user
                            </A_button>
                            <p>
                                Friend
                            </p>
                        </div>
                    </div>
                ))}
            </Layout>
        </>
    )
}

export default User