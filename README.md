# Personal
My own personal website for tools and Laravel practice

## Development

### System Dependencies
- Docker 

### Setup
- Insert the following line at the end of .bash_aliases or .bashrc
```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```
- Install php dependencies
```bash
docker run -it --rm -w /project -v ${PWD}:/project -u ${UID} composer install
```
- Copy .env.example to .env
```bash
cp .env.example .env
```
- Run development environment
```bash
sail up -d
```
- Generate app key
```bash
sail artisan key:generate
```
- Link storage
```bash
sail artisan storage:link
```
- Run migrations
```bash
sail artisan migrate
```
- Install Laravel Passport
```bash
sail artisan passport:install
```
- Install frontend dependencies
```bash
sail yarn
```
- Build JS and CSS
```bash
sail yarn build
```
- To test the back-end, run the following:
```bash
sail artisan test
```
- To test the admin user interface, run the following:
```bash
docker-compose exec admin_builder bash -c 'ng test --no-watch'
```
