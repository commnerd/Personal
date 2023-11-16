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
docker run -it --rm -w /project -v ${PWD}:/project composer install
```
- Run development environment
```bash
sail up -d
```
- To test the back-end, run the following:
```bash
sail artisan test
```
- To test the admin user interface, run the following:
```bash
docker-compose exec admin_builder bash -c 'ng test --no-watch'
```
