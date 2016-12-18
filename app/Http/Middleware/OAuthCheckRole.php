<?php


namespace CodeDelivery\Http\Middleware;

use Closure;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use CodeDelivery\Repositories\UserRepository;

class OAuthCheckRole
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * OAuthCheckRole constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  $role -> Parametro adicionado para o middleware
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // Pega o ID do usuário
        $id = Authorizer::getResourceOwnerId();
        
        // Procura o usuário através do ID
        $user = $this->userRepository->find($id);

        // Verifica a $role do usuário
        if ($user->role != $role) {
            abort(403, 'Access Forbidden');
        }

        return $next($request);
    }
}
