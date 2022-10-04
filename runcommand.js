function execute(command) {
    const exec = require("child_process").exec;

    exec(command, (err, stdout, stderr) => {
        process.stdout.write(stdout);
    });
}


setInterval(() => {
    execute("php artisan email:inactiveUsers");
}, 60000);