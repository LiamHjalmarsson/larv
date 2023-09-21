import React, { useState } from 'react';
import Layout from '../../components/Shared/layout';
import Input_form from '../../components/Ui/Input/Input_form';
import styles from "./Create.module.css";

function CreateUserForm() {
    let [name, setName] = useState("");
    let [username, setUsername] = useState("");
    let [email, setEmail] = useState("");
    let [password, setPassword] = useState("");
    let [avatar, setAvatar] = useState("");

    const submitHandler = async (e) => {
        e.preventDefault();

        const payload = {
            name,
            username,
            email,
            password,
            avatar
        };

        console.log(payload);

    };

    let nameChangeHandler = (e) => {
        setName(e.target.value);
    }

    let usernameChangeHandler = (e) => {
        setUsername(e.target.value);
    }

    let emailChangeHandler = (e) => {
        setEmail(e.target.value);
    }

    let passwordChangeHandler = (e) => {
        setPassword(e.target.value);
    }

    let avatarChangeHandler = (e) => {
        setAvatar(e.target.value);
    }


    return (
        <Layout>
            <form className={styles.form} 
                action="{{ route('user.store') }}"
                method="POST" 
                encType="multipart/form-data" 
                onSubmit={submitHandler}
            >

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <Input_form 
                    label="Name"
                    input={{ 
                        id: "name",
                        name: "name",
                        placeholder: "Enter name",
                        type: "text",
                        value: name,
                        onChange: nameChangeHandler
                    }}
                />

                <Input_form 
                    label="Username"
                    input={{ 
                        id: "username",
                        name: "username",
                        placeholder: "Enter username",
                        type: "text",
                        value: username,
                        onChange: usernameChangeHandler
                    }}
                />

                <Input_form 
                    label="Email"
                    input={{ 
                        id: "email",
                        name: "email",
                        placeholder: "Enter Email",
                        type: "email",
                        value: email,
                        onChange: emailChangeHandler
                    }}
                />

                <Input_form 
                    label="Password"
                    input={{ 
                        id: "password",
                        name: "password",
                        placeholder: "Enter Password",
                        type: "password",
                        value: password,
                        onChange: passwordChangeHandler
                    }}
                />

                <Input_form 
                    label="Avatar"
                    input={{ 
                        id: "avatar",
                        name: "avatar",
                        placeholder: "Enter Avatar",
                        type: "file",
                        value: avatar,
                        onChange: avatarChangeHandler
                    }}
                />

                <div className="component__form__div__div">
                    <a href="{{ route('auth.create') }}" className="component__form__div__div__button">
                        Login
                    </a>
                    <button type="submit" className="component__form__div__div__button">
                        Create user
                    </button>
                </div>
            </form>
        </Layout>
    );
}

export default CreateUserForm;
