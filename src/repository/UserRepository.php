<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUserByEmail(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        try {
            if(!$user) {
                throw new Exception("There is no such user!");
            }
            return new User(
                $user['email'],
                $user['password'],
                $user['id_user'],
                $user['id_role']
            );
        } catch(Exception $exception) {
            return null;
        }
    }

    public function getUserById(int $idUser): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE id_user = :id_user
        ');
        $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        try {
            if(!$user) {
                throw new Exception("There is no such user!");
            }
            return new User(
                $user['email'],
                $user['password'],
                $user['id_user'],
                $user['id_role']
            );
        } catch(Exception $exception) {
            return null;
        }
    }

    public function addNewUser(User $user): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users (email, password)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword()
        ]);
    }

    public function updatePassword(User $user, $newPassword): void
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE public.users SET password = :password
            WHERE id_user = :id_user
        ');
        $idUser = $user->getIdUser();
        $stmt->bindParam(':password', $newPassword, PDO::PARAM_STR);
        $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getRegisteredUsers()
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM registered_users
        ');

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}