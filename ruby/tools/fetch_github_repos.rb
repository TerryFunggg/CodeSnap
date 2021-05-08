require 'net/http'
require 'uri'
require 'json'

# Little script help you fetch all github repos by given name
class ReposFetch
  def initialize(url)
    @url = url
    @count = 0
  end

  def fetch
    json = json_parse(response(url_parse(@url)))
    return puts "User #{json['message']}" if json.is_a?(Hash) && json['message'] == 'Not Found'

    json.map { |repo| git_repo repo['clone_url'] }

    puts "Done! Total downloads #{@count} repos"
  end

  private

  def git_repo(repo_url)
    name = repo_url.scan(/\w+.git$/)
    puts "Fetching #{name}..."
    `git clone #{repo_url}`
    @count += 1
  end

  def json_parse(body)
    JSON.parse(body)
  end

  def url_parse(url)
    URI.parse(url)
  end

  def response(url)
    (Net::HTTP.get_response url).body
  end
end

print 'Enter github user name?: '
user_name = gets.chomp.downcase
ReposFetch.new("https://api.github.com/users/#{user_name}/repos").fetch
